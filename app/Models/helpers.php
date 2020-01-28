<?php

use App\Models\ClientRate;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\DeleteAll ;
use App\Models\Events\Notifications;
use App\Models\RouteModel ;
use App\Models\Notification;
function delete_multiselect(Request $request) // select many contract from index table and delete them
{
    $selected_list =  explode(",",$request['selected_list']);
    foreach ($selected_list as $item)
    {
        DB::table($request['table_name'])->where('id',$item)->delete() ;
    }
    \Session::flash('success', \Lang::get('messages.custom-messages.deleted'));
}

function restore($table_name,$record_id)
{
    \DB::table($table_name)->where('id',$record_id)->update(['rectype_id'=>2]);
}

function get_delete_all_flag()
{
    $route = \Route::getFacadeRoot()->current()->uri();
    $get_route = RouteModel::where('route',$route)->where('method','get')->first() ;
    $flag = $get_route->delete_all_model ;
    if($flag)
        return true ;
    return false ;
}

function get_static_routes()
{

Route::get('/test','DashboardController@test');

    // // Authentication Routes...
    // Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    // Route::post('login', 'Auth\LoginController@login');
    // Route::post('logout', 'Auth\LoginController@logout')->name('logout');
    //
    // // Registration Routes...
    // Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'Auth\RegisterController@register');
    //
    // // Password Reset Routes...
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Auth::routes();

    Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);

    Route::get('/','DashboardController@index');

    Route::group(['middleware'=> 'auth'],function(){
    Route::resource('static_translation','\App\Models\Http\Controllers\StaticTranslationController');
    Route::get('read_notify',function(){
        \App\Models\Notification::where('notified_id',\Auth::id())->update([
            'seen' => 1
        ]);
    });
    });

    Route::group(['middleware' =>['auth',"role:super_admin"]],function(){
        Route::get('routes_v2','RouteController@create_v2') ;
        Route::get('routes/index_v2','RouteController@index_v2') ;
        Route::get('get_controller_methods','RouteController@get_methods_for_selected_controller') ;
        Route::post('routes/store_v2','RouteController@store_v2') ;
        Route::get('get_notify/{id}','OrderController@load_notify');

        Route::get('ldap','DashboardController@ldap') ;
        Route::get('export_DB','DashboardController@export_DB_backup') ;
        Route::get('database_backups','DashboardController@list_backups')  ;
        Route::get('delete_backup','DashboardController@delete_backup')  ;
        Route::get('import_DB','DashboardController@import_DB_backup') ;
        Route::get('download_backup','DashboardController@download_backup') ;
        Route::get('/clear-cache','DashboardController@clear_cache' );
        Route::get('admin/elfinder', 'ElfinderController@getIndex');
        Route::post('admin/elfinder', 'ElfinderController@getIndex');
         Route::get('admin/seed_manager', 'DashboardController@seed_manager');
        Route::post('admin/seed_tables', 'DashboardController@seed_tables');
        Route::get('admin/migrate_manager', 'DashboardController@migrate_manager');
        Route::post('admin/migrate_tables', 'DashboardController@migrate_tables');
    });


    Route::post('delete_multiselect',function (Request $request){
        if (strlen($request['selected_list'])==0)
        {
            \Session::flash('failed',\Lang::get('messages.custom-messages.no_selected_item'));
            return back();
        }
        delete_multiselect($request) ;
        return back();
    });
    Route::get('get_table_ids','DashboardController@get_table_ids_list') ;
}

function get_dynamic_routes()
{
   $route = \Request::url() ;
   $request_method = strtolower(\Request::method()) ;
   $action = "" ;
   $checker = false ;
   $url_to = \URL::to('') ;
   $start_from = strpos($route,$url_to) ;
   for($i=strlen($url_to)+1;$i<strlen($route);$i++)
   {
       // ex : url = http://localhost/ivas_template_v2/users => so i want to skip all before users
       if(is_numeric($route[$i]))
       {
           if(!$checker){
               if($route[$i-1]=="/")
               {
                // it may be a route with name index_v2,without this validation it will be index_v{id}
                    $action .= "{id}" ;
                    // for the edit request , language/9/edit => language/{id}/edit
                    $checker = true ;
               }
               else
                   $action .= $route[$i] ;
           }
           else
               continue ;
       }
       else{
           $action .= $route[$i] ;
       }
   }
    try{
       $query = "SELECT * FROM routes
                      JOIN role_route ON routes.id = role_route.route_id
                      JOIN roles ON role_route.role_id = roles.id
                      WHERE routes.route = '".$action."' AND routes.method='".$request_method."'" ;
       $route_model = \DB::select($query);
       if(count($route_model) > 0)
       {
           dynamic_routes($route_model,true) ;
       }
       else{
           $query_2 = "SELECT * FROM routes
                            WHERE routes.route = '".$action."'
                            AND routes.method='".$request_method."'" ;
           $route_model = \DB::select($query_2);
           dynamic_routes($route_model,false) ;
       }
    }
    catch(Illuminate\Database\QueryException $e){

    }

}

function dynamic_routes($route_model,$found_roles)
{
    $roles = "" ;
    if(count($route_model)==0)
    {
        return ;
    }
    $route = $route_model[0]->route ;
    $controller_method =
    $route_model[0]->controller_name."@".$route_model[0]->function_name ;
    $route_method = $route_model[0]->method ;
    if($found_roles)
    {
         for($i= 0 ; $i < count($route_model) ; $i++)
         {
            $roles .= $route_model[$i]->name ;
            if($i < count($route_model) - 1 )
               $roles .= "|" ;
         }
        Route::group(['middleware' =>['auth',"role:".$roles]],
        function() use($route_model,$route_method,$route,$controller_method){
                if($route_method=="resource")
                    Route::resource($route,$controller_method) ;
                else if($route_method=="get")
                    Route::get($route,$controller_method) ;
                else if($route_method=="post")
                    Route::post($route,$controller_method) ;
                else if($route_method=="put")
                    Route::put($route,$controller_method) ;
                else if($route_method=="patch")
                    Route::patch($route,$controller_method) ;
                else if($route_method=="delete")
                    Route::delete($route,$controller_method) ;
        }) ;
    }
    else{
          Route::group(['middleware' =>['auth']],
        function() use($route_model,$route_method,$route,$controller_method){
                if($route_method=="resource")
                    Route::resource($route,$controller_method) ;
                else if($route_method=="get")
                    Route::get($route,$controller_method) ;
                else if($route_method=="post")
                    Route::post($route,$controller_method) ;
                else if($route_method=="put")
                    Route::put($route,$controller_method) ;
                else if($route_method=="patch")
                    Route::patch($route,$controller_method) ;
                else if($route_method=="delete")
                    Route::delete($route,$controller_method) ;
        }) ;
    }
 }

 function categorys(){
     $categorys = \App\Models\Category::whereNull('parent_id')->get();
     return $categorys;
 }
function brands(){
    $brands = \App\Models\Brand::all();
    return $brands;
}
 function sub_cat_from_brand($brand_id){
    $cats   =  \App\Models\Category::select('categories.*')->join('products','products.category_id','=','categories.id')
              ->join('brands','products.brand_id','=','brands.id')
              ->where('products.brand_id',$brand_id)
              ->groupBy('categories.id')
              ->get();

    return $cats;
 }

 function getCode() {

    $code = App::getLocale();
    //$code = setting('lang');
    return $code;
}

function get_limit_paginate(){
    return setting('page_limit');
}

function setting($key){
   return  \DB::table('settings')->where('key','like','%'.$key.'%')->first()->value;
}

function setting_2($key){
   return  \App\Models\StaticTranslation::getBodyByKeyWord($key,getCode());
}

function count_session_cart()
{
    $count = 0;
    if(isset($_COOKIE['carts'])){
        $carts = unserialize($_COOKIE['carts']);
        $count = count($carts);
    }
    return $count;
}

function product($id){
    return \App\Models\Product::find($id);
}

function all_notify()
{
    $Notification = Notification::with('send_user')->where('notified_id',\Auth::id())->latest()->take(5)->get();
    $count_Notification = Notification::where('seen',0)->where('notified_id',\Auth::id())->count();
    return ['Notification'=> $Notification,'count' => $count_Notification];
}

function send_notification($message,$user_id,$data){
        $user = \App\Models\User::find(1);
        $link = url('order/'.$data->id);
        Notification::create([
            'notifier_id' => $user_id,
            'notified_id'  => $user->id,
            'subject' => $message,
            'link'   =>$link
        ]);
        broadcast(new Notifications($message,$user,$link))->toOthers();
}

function ar_en()
{
    if(\App::getLocale() == 'ar'){
        return 'text-right';
    }
    else{
        return 'text-left';
    }
}

function dir_ar_en()
{
    if(\App::getLocale() == 'ar'){
        return 'rtl';
    }
    else{
        return 'ltr';
    }
}

 function is_buy($p_id){
    if(\Auth::guard('client')->check()){
    $order=\App\Models\Models\Order::join('order_details','orders.id','=','order_details.order_id')
    ->join('products','products.id','=','order_details.product_id')
    ->where('orders.user_id',\Auth::guard('client')->user()->id)
    ->where('orders.status',3)
    ->where('products.id',$p_id)->first();
        if($order){
            return true;
        }
    }
    return false;
}

function is_not_rate($p_id){
    $rate = ClientRate::where('user_id',\Auth::guard('client')->user()->id)
                ->where('product_id',$p_id)->first();
    if($rate){
        return false;
    }
    return true;
}

function ads(){
    $ads = \App\Models\Advertisement::all();
    return $ads;
}

function last_price($price){
    $coupons = \App\Models\Coupon::where('user_id',\Auth::guard('client')->user()->id)->where('used',1)->sum('value');
    return $price-$coupons;
}
