<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//USER
Route::post('/register', 'UserController@Register');
Route::post('/login', 'UserController@Login');
Route::get('/activeUser/{email}', 'UserController@ActiveUser');
Route::get('/updateFirstTime/{id}', 'UserController@UpdateFirstTime');
Route::get('/getUserData/{user_id}', 'UserController@GetUserData');
Route::post('/editUserData/{id}', 'UserController@EditUserData');
Route::post('/storeUserPlan/{id}', 'UserController@StoreUserPlan');
Route::post('/userQuestionnaire/{id}', 'UserController@UserQuestionnaire');
Route::get('/forgotPassword/{id}', 'UserController@ForgotPassword');
Route::post('/resendMailforResetPassword/{email}', 'UserController@ResendMailforResetPassword');
Route::post('/resetPassword/{email}', 'UserController@ResetPassword');
Route::get('/resendMail/{user_id}', 'UserController@ResendMail');
Route::get('/checkEmail/{email}', 'UserController@checkEmail');
Route::post('/contactUs', 'UserController@ContactUs');
Route::post('/freezePlan', 'UserController@FreezePlan');
Route::get('/showUserProfile', 'UserController@ShowUserProfile');
Route::get('/admin/normalUserProfile/{user_id}', 'UserController@ViewProfile')->name('admin.normalUserProfile');

//USER CRUD Operation
Route::post('/createUser', 'UserController@CreateUser');
Route::get('/readUser', 'UserController@ReadUser');
Route::get('/viewUser/{user_id}', 'UserController@ViewUser');
Route::post('/updateUser/{user_id}', 'UserController@UpdateUser');
Route::get('/deleteUser/{user_id}', 'UserController@DeleteUser');

//MENU PLANS
Route::post('/importUserMenu/import', 'MenuPlanController@store');
Route::post('/importUserMenu', 'MenuPlanController@store');


//PLANS
Route::post('/buyPlan', 'PlanController@BankPayment');
Route::get('/listPlan', 'PlanController@ListPlan');
Route::get('/getPlanbyId/{plan_id}', 'PlanController@GetPlanebyId');
Route::post('/createPlan', 'PlanController@CreatePlan');
Route::get('/readPlan', 'PlanController@ListPlan');
Route::get('/viewPlan/{plan_id}', 'PlanController@GetPlanebyId');
Route::post('/updatePlan/{plan_id}', 'PlanController@UpdatePlan');
Route::get('/deletePlan/{plan_id}', 'PlanController@DeletePlan');

//PROMO CODE
Route::get('/checkPromocode/{promocode}', 'PromocodeController@CheckPromocode');
Route::post('/createPromocode', 'PromocodeController@CreatePromocode');
Route::get('/readPromocode', 'PromocodeController@ReadPromocode');
Route::get('/viewPromocode/{promocode_id}', 'PromocodeController@ViewPromocode');
Route::post('/updatePromocode/{promocode_id}', 'PromocodeController@UpdatePromocode');
Route::get('/deletePromocode/{promocode_id}', 'PromocodeController@DeletePromocode');
Route::post('/deleteBulkPromoCode', 'PromocodeController@DeleteBulkPromoCode');

//Payment
Route::get('/pay','PlanController@getAccessToken');

//checkonBankPaymentStatus
Route::post('/checkBankPaymentStatus', 'PlanController@GetPaymentStatus');
