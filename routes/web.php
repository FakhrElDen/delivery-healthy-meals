<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testemail', function () {
    // $data = array();
    $data = array(
        'name'    => "marwa",
        'email'   => "mara@marwa.com",
        "mobile" => "01003932212",
        "meal_name" => "lean plan",
        "img" =>"test",
        "price"=>"3450",
        "promo_value"=>"0"
    ); 
    // dd($data['name']);
    return view('confirm_user_plan_email_template')->with('data', $data);
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/admin/normalUserProfile', 'UserController@ViewUserProfile');
// Route::get('/admin/normalUserProfile/{user_id}', 'UserController@UserProfile')->name('admin.normalUserProfile');