<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('register', 'Api\AuthController@signup');
Route::post('login', 'Api\AuthController@login');
Route::middleware(['auth:api'])->group(function () {
  Route::get('home','Api\HomeController@index');
  Route::post('lang','Api\HomeController@ChangeLocale');
  Route::resource('users','Api\UserController');
  Route::resource('countrys','Api\CountryController');
  Route::resource('states','Api\StateController');
  Route::resource('citys','Api\CityController');
  Route::resource('advertisments','Api\AdvertismentController');
  Route::resource('categorys','Api\CategoryController');
  Route::resource('sub_categorys','Api\SubCategoryController');
  Route::resource('coupons','Api\CouponController');
  Route::resource('settings','Api\SettingController');
  Route::resource('brands','Api\BrandController');
  Route::resource('languages','Api\LanguageController');
  Route::resource('products','Api\ProductController');
  Route::get('all_country', function()
  {
    return \App\Models\Country::select('id','name as label')->get();
  });
  Route::get('all_state', function()
  {
    return \App\Models\State::select('id','name as label')->get();
  });
  Route::get('all_category', function()
  {
    $categorys = \App\Models\Category::select('id','title as label')->get();
    $categorys->prepend(['id' => null ,'label'=> 'Choose Parent' ]);
    return  $categorys;
  });
  Route::get('all_brand', function()
  {
    $brands = \App\Models\Brand::select('id','title as label')->get();
    $brands->prepend(['id' => null ,'label'=> 'Choose Parent' ]);
    return  $brands;
  });
  Route::get('content_type', function()
  {
    return \App\Models\Type::select('id','title as label')->get();
  });
  Route::post('delete_all','Api\HomeController@delete_all');
});
Route::get('items',function(){
  $array = [];
  $data['url'] = '/';
  $data['name'] = 'Home';
  $data['slug'] = 'home';
  $data['icon'] = 'HomeIcon';
  $data['i18n'] = 'home';
  array_push($array,(object)$data);
  $data['url'] = '/user';
  $data['name'] = 'Users';
  $data['slug'] = 'users';
  $data['icon'] = 'UsersIcon';
  $data['i18n'] = 'user';
  array_push($array,(object)$data);
  $data['url'] = '/countrys';
  $data['name'] = 'Countries';
  $data['slug'] = 'country';
  $data['icon'] = 'GlobeIcon';
  $data['i18n'] = 'country';
  array_push($array,(object)$data);
  $data['url'] = '/advertisments';
  $data['name'] = 'Advertisments';
  $data['slug'] = 'advertisment';
  $data['icon'] = 'TvIcon';
  $data['i18n'] = 'advertisment';
  array_push($array,(object)$data);
  $data['url'] = '/categorys';
  $data['name'] = 'Categorys';
  $data['slug'] = 'category';
  $data['icon'] = 'LayersIcon';
  $data['i18n'] = 'category';
  array_push($array,(object)$data);
  $data['url'] = '/coupons';
  $data['name'] = 'Coupons';
  $data['slug'] = 'Coupons';
  $data['icon'] = 'MoonIcon';
  $data['i18n'] = 'coupon';
  array_push($array,(object)$data);
  $data['url'] = '/settings';
  $data['name'] = 'Settings';
  $data['slug'] = 'Settings';
  $data['icon'] = 'SettingsIcon';
  $data['i18n'] = 'setting';
  array_push($array,(object)$data);
  $data['url'] = '/brands';
  $data['name'] = 'Brands';
  $data['slug'] = 'brands';
  $data['icon'] = 'ArchiveIcon';
  $data['i18n'] = 'brand';
  array_push($array,(object)$data);
  $data['url'] = '/languages';
  $data['name'] = 'Languages';
  $data['slug'] = 'language';
  $data['icon'] = 'ChromeIcon';
  $data['i18n'] = 'language';
  array_push($array,(object)$data);
  $data['url'] = '/products';
  $data['name'] = 'Products';
  $data['slug'] = 'products';
  $data['icon'] = 'BookIcon';
  $data['i18n'] = 'products';
  array_push($array,(object)$data);
  return $array;
});
