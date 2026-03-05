<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'securedVerifiedBusiness'], function () {

Route::prefix('business/verified/')->group(function(){

Route::prefix('branch/')->group(function(){
Route::get('fetch_manager_list', [App\Http\Controllers\API\Business\BranchManagementController::class, 'fetchBranchManagerList']);
Route::get('fetch_branch_list', [App\Http\Controllers\API\Business\BranchManagementController::class, 'fetchBranchList']);
Route::get('fetch_single_branch/{id}', [App\Http\Controllers\API\Business\BranchManagementController::class, 'fetchSingleBranch']);

Route::post('create_manager', [App\Http\Controllers\API\Business\BranchManagementController::class, 'createBranchManager']);
Route::post('create_branch', [App\Http\Controllers\API\Business\BranchManagementController::class, 'createBranch']);

Route::put('update_branch/{id}', [App\Http\Controllers\API\Business\BranchManagementController::class, 'updateBranch']);
Route::delete('delete_branch/{id}', [App\Http\Controllers\API\Business\BranchManagementController::class, 'deleteBranch']);
Route::delete('delete_manager/{id}', [App\Http\Controllers\API\Business\BranchManagementController::class, 'deleteBranchManager']);
});

    Route::prefix('store/')->group(function(){

        Route::post('create_store_subscription', [App\Http\Controllers\API\Business\StoreController::class, 'createStoreSubscription']);
      
        Route::get('fetch_store_info', [App\Http\Controllers\API\Business\StoreController::class, 'index']);

       
        Route::post('update_store_info',  [App\Http\Controllers\API\Business\StoreController::class, 'updateStoreInfo']);
        Route::post('upload_store_images',  [App\Http\Controllers\API\Business\StoreController::class, 'uploadStoreImages']);

        Route::post('update_store_profile_status',  [App\Http\Controllers\API\Business\StoreController::class, 'updateStoreProfileStatus']);
        Route::post('reset_store_profile_status',  [App\Http\Controllers\API\Business\StoreController::class, 'resetStoreProfileStatus']);
       

        Route::prefix('products/')->group(function(){

            
            Route::get('fetch_product_list', [App\Http\Controllers\API\Business\ProductController::class, 'index']);
            Route::get('fetch_single_product/{id}', [App\Http\Controllers\API\Business\ProductController::class, 'fetchSingleProduct']);
            
            Route::post('upload_new_product', [App\Http\Controllers\API\Business\ProductController::class, 'uploadNewProduct']);
            Route::post('update_product/{id}', [App\Http\Controllers\API\Business\ProductController::class, 'updateProduct']);
            Route::delete('delete_product/{id}', [App\Http\Controllers\API\Business\ProductController::class, 'deleteProduct']);
            
        });
       
        // Route::post('create_product',  [App\Http\Controllers\API\Business\StoreController::class, 'createProduct']);
        
        // Route::post('update_product_images',  [App\Http\Controllers\API\Business\StoreController::class, 'updateProductImage']);
        
        // Route::post('update_product',  [App\Http\Controllers\API\Business\StoreController::class, 'updateProduct']);
        
        // Route::post('remove_product_img',  [App\Http\Controllers\API\Business\StoreController::class, 'removeProductImage']);
        
        // // Route::put('/update_event/{id}', 'EventController@update_event')->name('update_event.api');
        // // Route::put('/update_ticket/{id}', 'EventController@update_ticket')->name('update_ticket.api');
        
        // Route::delete('delete_product/{id}',  [App\Http\Controllers\API\Business\StoreController::class, 'deleteProduct']);
          
        });
   

    });

});