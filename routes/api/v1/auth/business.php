<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'securedBusiness'], function () {

Route::prefix('business/')->group(function(){

Route::get('fetch_profile_info', [App\Http\Controllers\API\Business\UserController::class, 'index']);

//Route::post('create_business_details', [App\Http\Controllers\API\Business\UserController::class, 'createBusinessDetails']);


Route::post('kyc_update', [App\Http\Controllers\API\Business\UserController::class, 'updateKYC']);

Route::prefix('security/')->group(function(){
Route::post('set_question', [App\Http\Controllers\API\Business\UserController::class, 'setSecurityQuestion']);
Route::post('set_pin', [App\Http\Controllers\API\Business\UserController::class, 'setSecurityPin']);
Route::post('verify_question', [App\Http\Controllers\API\Business\UserController::class, 'verifySecurityQuestion']);
Route::post('verify_pin', [App\Http\Controllers\API\Business\UserController::class, 'verifySecurityPin']);
Route::post('remove_question', [App\Http\Controllers\API\Business\UserController::class, 'removeSecurityQuestion']);
Route::post('remove_pin', [App\Http\Controllers\API\Business\UserController::class, 'removeSecurityPin']);
Route::post('two_fa', [App\Http\Controllers\API\Business\UserController::class, 'twoFA']);
});




//bank account detail insertion and update as a single route
Route::post('enter_bank_detail', [App\Http\Controllers\API\Business\UserController::class, 'createBankDetail']);
//bank account detail delete route
Route::delete('remove_bank_detail/{id}', [App\Http\Controllers\API\Business\UserController::class, 'deleteBankDetail']);

Route::post('validate_bank_account', [App\Http\Controllers\API\Business\UserController::class, 'validateBankAccount']);


Route::post('logout', [App\Http\Controllers\API\Business\AuthController::class, 'logout']);

Route::get('refresh_token', [App\Http\Controllers\API\Business\UserController::class, 'refreshToken']);

Route::delete('delete_user_account', [App\Http\Controllers\API\Business\UserController::class, 'deleteUserAccount']);

Route::delete('/delete_customer_account', 'CustomerController@delete_customer_account')->name('delete_customer_account.api');

Route::post('createNewToken', [App\Http\Controllers\API\Business\AuthController::class, 'createNewToken']);

Route::post('generate_code', [App\Http\Controllers\API\Business\AuthController::class, 'generateCode']);


    });

});