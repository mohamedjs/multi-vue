<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/', function () {
    return redirect(route("admin.home.index"));
});

Route::prefix("admin")->namespace("Admin")->group(function () {
    Route::get("login", "LoginController@form")->name("admin.login.form");
    Route::post("login", "LoginController@attempt")->name("admin.login.attempt");
});

Route::prefix("admin")->namespace("Admin")->middleware("auth")->group(function () {
    Route::get("/", "HomeController@index")->name("admin.home.index");
    Route::resource("users", "UserController", ['as' => 'admin']);
    Route::post('add/notify','UserController@send_notification')->name('admin.users.send_notify');
    Route::post('user/remove/all','UserController@remove_all')->name('admin.users.delete.all');
    Route::get('last/notify',"UserController@last_notify")->name('admin.users.last_notify');
    Route::get('read/notify',"UserController@read_all")->name('admin.users.read_notify');
    Route::resource("cities", "CityController", ["as" => "admin"]);
    Route::resource("areas", "AreaController", ["as" => "admin"]);
    Route::resource("contact/us", "ContactUsController", ["as" => "admin"])
        ->parameter("us", "contactUs")
        ->name("index","admin.contact.us.index")
        ->name("show", "admin.contact.us.show")
        ->name("destroy", "admin.contact.us.destroy")
        ->only("index", "show", "destroy");
    Route::resource("categories", "CategoryController", ["as" => "admin"]);
    Route::resource("providers", "ProviderController", ["as" => "admin"]);
    Route::resource("demands", "DemandController", ["as" => "admin"]);
    Route::get('remove/item/{id}','DemandController@removeItem');
    Route::post('demands/remove/all','DemandController@remove_all')->name('admin.demands.delete.all');
    Route::resource("demands.assignees", "DemandAssigneeController", ["as" => "admin"]);
    Route::resource("chats", "ChatController", ["as" => "admin"]);
    Route::resource('roles', 'RoleController', ['as' => 'admin']);
    Route::resource('payments', 'PaymentController', ['as' => 'admin'])->only("index");
    Route::get('reports/users','ReportController@users')->name("admin.reports.users");
    Route::get('reports/providers','ReportController@providers')->name("admin.reports.providers");
    Route::get('reports/cities','ReportController@cities')->name("admin.reports.cities");
    Route::get('reports/financials','ReportController@financials')->name("admin.reports.financials");
    Route::prefix('/role/{role}')->group(function () {
        Route::resource('permissions', 'RolePermissionController', ['as' => "admin.role"])
            ->parameter('permissions', 'rolePermission');
    });
    Route::prefix("/users/{user}")->group(function () {
        Route::resource("roles", "UserRolesController", ['as' => "admin.users"]);
    });
});

Route::view("api/documentation", "API/index");
// Route::get('test',function(){
//   return \App\Models\User::all();
// });
