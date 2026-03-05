<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'securedSuperAdmin'], function () {

    Route::prefix('admin/')->group(function(){
     
    Route::get('fetch_profile_info', [App\Http\Controllers\API\Admin\UserController::class, 'index']);
    
    Route::get('fetch_business_infos', [App\Http\Controllers\API\Admin\BusinessController::class, 'index']);
    
    Route::get('fetch_business_counter', [App\Http\Controllers\API\Admin\BusinessController::class, 'businessCounter']);
    Route::get('fetch_approved_business_infos', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchApprovedBusinesses']);
    Route::get('fetch_unapproved_business_infos', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchUnapprovedBusinesses']);
    Route::get('fetch_approved_branch_infos', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchApprovedBranches']);
    Route::get('fetch_unapproved_branch_infos', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchUnapprovedBranches']);
    Route::get('fetch_single_business/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchSingleBusiness']);
    Route::get('fetch_single_branch/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchSingleBranch']);
 
    Route::get('verify_business_info/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'verifyBusinessInfo']);
    Route::get('verify_branch_info/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'verifyBranchInfo']);
    Route::get('fetch_business_type/{type}', [App\Http\Controllers\API\Admin\BusinessController::class, 'fetchBusinessType']);



    Route::post('approve_business_info', [App\Http\Controllers\API\Admin\BusinessController::class, 'approveBusinessInfo']);
    Route::post('approve_business_branch_info/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'approveBranchInfo']);


    Route::post('create_category', [App\Http\Controllers\API\Admin\BusinessController::class, 'createCategory']);
    Route::post('create_sub_category/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'createSubCategory']);

    Route::delete('delete_category/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'deleteCategory']);
    Route::delete('delete_sub_category/{id}', [App\Http\Controllers\API\Admin\BusinessController::class, 'deleteSubCategory']);

    
   
    Route::get('fetch_pickup_location_list', 'ProductController@fetch_pickup_location_list')->name('fetch_pickup_location_list.api');
    Route::post('create_pickup_location_list', 'ProductController@create_pickup_location_list')->name('create_pickup_location_list.api');

    });

});