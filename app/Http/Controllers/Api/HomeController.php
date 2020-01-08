<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Product;
use App\Models\Contact;
use App\User;
use App\Models\UserAddress;
use App\Models\UserRate;
use App\Models\State;
use App\Models\City;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderDetail;
use App\Http\Middleware\Language;
use Validator;
use Mail;
use Braintree_Gateway;
class HomeController extends Controller
{
  //api for home page to get analyticsData
  public function index()
  {
    $data ['anyclients']   = $this->anayltic(user::query());
    $data ['anyorders']    = $this->anayltic(Order::query());
    $data ['anyrevenus']   = $this->anayltic(Order::query(),'revenue');
    $data ['anycarts']     = $this->anayltic(Cart::query());
    $data ['latest_orders']= Order::with(['client','address.city.state.country'])->orderBy('orders.id','desc')->take(5)->get();
    $data ['coupons']      = Coupon::select(\DB::raw('count(*) as count_coupon'))->groupBy('used')->orderBy('used')->pluck('count_coupon')->toArray();
    $data ['orders']       = Order::select(\DB::raw('count(*) as count_order'))->groupBy('status')->orderBy('status')->pluck('count_order')->toArray();
    $data ['month_revenue']= $this->month_revenue();
    return response()->json(['status' => 'success' , 'data' => $data , 'message' => 'Get All Info About Project']);
  }
  // draw chart for client by divide coming user in every year
  public function anayltic($model,$type=Null)
  {
    if($type && $type = "revenue"){
      $model = $model->where('status',3)->select(\DB::raw('FLOOR(sum(total_price)) as count_in_year'));
    }
    else{
      $model = $model->select(\DB::raw('count(*) as count_in_year'));
    }
    $model = $model->groupBy(\DB::raw('year(created_at)'))->orderBy(\DB::raw('year(created_at)'))->pluck('count_in_year')->toArray();
    $model = $this->perappend($model);
    return $model;
  }
  // unshift for draw first data in vue without error
  public function perappend(array $array)
  {
    array_unshift($array,1);
    array_unshift($array,0);
    return $array;
  }
  // draw chart for month revenue
  public function month_revenue()
  {
    $current = Order::where('status',3)->select(\DB::raw('sum(total_price) as count_in_month'))
                              ->whereYear('created_at' ,'=', date('Y'))
                              ->groupBy(\DB::raw('month(created_at)'))
                              ->pluck('count_in_month')->toArray();

    $prv    = Order::where('status',3)->select(\DB::raw('sum(total_price) as count_in_month'))
                              ->whereYear('created_at', '=', \Carbon\Carbon::now()->subWeeks(52)->format('Y'))
                              ->groupBy(\DB::raw('month(created_at)'))
                              ->pluck('count_in_month')->toArray();

   $current_month = Order::where('status',3)->select(\DB::raw('month(created_at) as month'))
                            ->whereYear('created_at' ,'=', date('Y'))
                            ->groupBy(\DB::raw('month(created_at)'))
                            ->pluck('month')->toArray();
   return [$current,$prv,$current_month];
  }
  //delete all from table
  public function delete_all(Request $request)
  {
    $table = \DB::table($request->table)->whereIn('id',explode(',',$request->all_data))->get();
    if(count($table) > 0){
      \DB::table($request->table)->whereIn('id',explode(',',$request->all_data))->delete();
      return response()->json(['status' => 'success' , 'data' => 'ok' , 'message' => 'Delete All Success']);
    }
    return response()->json(['status' => 'error' , 'data' => 'ok' , 'message' => 'Faild To Remove All']);
  }
  // change lang
  public function ChangeLocale(Request $request)
  {
    $lang = $request->lang;
    if (array_key_exists($lang, \Config::get('languages'))) {
        \Session::put('applocale', $lang);
        \App::setLocale($lang);
        \DB::table('settings')->where('key','like','%lang%')->update(['value' => $lang]);
    }
    return response()->json(['status' => 'success' , 'data' => 'ok' , 'message' => 'Delete All Success']);
  }
}
