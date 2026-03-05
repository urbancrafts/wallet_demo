<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;



Route::prefix('auth/admin/')->group(function(){//admin grouped auth routes
    Route::post('login', [App\Http\Controllers\API\Admin\AuthController::class, 'login']);
    Route::post('create_create', [App\Http\Controllers\API\Admin\AuthController::class, 'createAccount']);

    Route::post('verify_email_code', [App\Http\Controllers\API\Admin\AuthController::class, 'verifyEmailCode']);
     
    });

Route::prefix('auth/user/')->group(function(){//buisness grouped auth routes
Route::post('register', [App\Http\Controllers\AuthController::class, 'register'])->name('register.api');
Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])->name('login.api');

//Route::post('login', [App\Http\Controllers\API\Business\AuthController::class, 'login']);
//Route::post('signup', [App\Http\Controllers\API\Business\AuthController::class, 'register']);

Route::post('verify_email_code', [App\Http\Controllers\API\Business\AuthController::class, 'verifyEmailCode']);

Route::post('reset_password_email_entry', [App\Http\Controllers\API\Business\AuthController::class, 'resetPasswordEmail']);
Route::post('password_reset_code_entry', [App\Http\Controllers\API\Business\AuthController::class, 'passwordResetCode']);
Route::post('new_password_entry', [App\Http\Controllers\API\Business\AuthController::class, 'newPasswordEntry']);

});

Route::prefix('auth/customer')->group(function(){
    
    Route::post('login', [App\Http\Controllers\API\Customer\AuthController::class, 'login']);
    Route::post('signup', [App\Http\Controllers\API\Customer\AuthController::class, 'register']);
    
    Route::post('verify_email_code', [App\Http\Controllers\API\Customer\AuthController::class, 'verifyEmailCode']);
    
        
    Route::post('reset_password_email_entry', [App\Http\Controllers\API\Customer\AuthController::class, 'resetPasswordEmail']);
    Route::post('password_reset_code_entry', [App\Http\Controllers\API\Customer\AuthController::class, 'verifyEmailCode']);
    Route::post('new_password_entry', [App\Http\Controllers\API\Customer\AuthController::class, 'newPasswordEntry']);
    
    Route::get('fetch_security_question', [App\Http\Controllers\API\Customer\AuthController::class, 'fetchSecurityQuestion']);
    
    });

Route::prefix('public/')->group(function(){
    Route::get('fetch_categories',  [App\Http\Controllers\API\ListingController::class, 'fetchCategories']);
    Route::get('fetch_farm_categories', [App\Http\Controllers\API\ListingController::class, 'fetchFarmCategories']);
    
    Route::get('fetch_newly_posted_products/{country}', [App\Http\Controllers\API\ListingController::class, 'fetchNewlyPostedProducts']);
    Route::get('fetch_newly_posted_farm_products/{country}', [App\Http\Controllers\API\ListingController::class, 'fetchNewlyPostedFarmProducts']);
    Route::get('fetch_exclusive_deal_products/{country}', [App\Http\Controllers\API\ListingController::class, 'fetchExclusiveDealProducts']);
    Route::get('fetch_exclusive_deal_farm_products/{country}', [App\Http\Controllers\API\ListingController::class, 'fetchExclusiveDealFarmProducts']);
    Route::get('fetch_integrated_products/{country}', [App\Http\Controllers\API\ListingController::class, 'fetchThirdPartyProducts']);
    Route::get('fetch_integrated_farm_products/{country}', [App\Http\Controllers\API\ListingController::class, 'fetchThirdPartyFarmProducts']);
    
    Route::get('filter_products_by_category/{country}', [App\Http\Controllers\API\ListingController::class, 'filterProductsByCategory']);
    
    Route::post('filter_products_only_by_search', [App\Http\Controllers\API\ListingController::class, 'filterProductsOnlyBySearch']);
    Route::post('filter_stores', [App\Http\Controllers\API\ListingController::class, 'filterStores']);
    Route::get('fetch_stores_by_type/{country}/{type}', [App\Http\Controllers\API\ListingController::class, 'fetchStoresByType']);
    Route::get('fetch_single_store/{id}', [App\Http\Controllers\API\ListingController::class, 'fetchSingleStore']);
    Route::get('fetch_single_product_with_store/{storeID}/{productID}', [App\Http\Controllers\API\ListingController::class, 'fetchSingleProductWithStore']);

   

//      Route::get('test_automattic', function () {
//     $response = Http::withHeaders([
//         'X-future' => 'automattician',
//     ])->get('https://public-api.wordpress.com/wpcom/v2/work-with-us');

//     if ($response->successful()) {
//         return $response->json(); // or $response['secret'] if you want just the secret
//     }

//     return response()->json([
//         'error' => 'Failed to fetch secret',
//         'status' => $response->status(),
//         'message' => $response->body(),
//     ], $response->status());
// });

    //Route::get('fetch_products_by_categories/{country}/{category}/{subcategory}', [App\Http\Controllers\API\ProductController::class, 'fetchProductsByCategories']);

    
    //Route::get('fetch_store_sub_categories/{category}', [App\Http\Controllers\API\ProductController::class, 'fetchStoreSubCategories']);

    
    

    
    Route::get('see_currency_convertion', [App\Http\Controllers\API\ProductController::class, 'seeCurrencyCovertion']);

    

   
    Route::get('fetch_countries', 'ConfigController@fetch_countries')->name('fetch_countries.api');

    Route::get('populate_states_by_country/{country_id}', 'ConfigController@populate_states_by_country')->name('populate_states_by_country.api');
    Route::get('populate_cities_by_state/{state_id}', 'ConfigController@populate_cities_by_state')->name('populate_cities_by_state.api');

    Route::get('fetch_pickup_location_list', 'ProductController@fetch_pickup_location_list')->name('fetch_pickup_location_list.api');
   
    


});