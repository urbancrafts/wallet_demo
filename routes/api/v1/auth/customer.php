<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'securedCustomer'], function () {

    Route::prefix('customer/')->group(function(){

        Route::get('fetch_profile_info', [App\Http\Controllers\API\Customer\CustomerController::class, 'index']);
        Route::post('kyc', [App\Http\Controllers\API\Customer\CustomerController::class, 'postKYC']);

        

        Route::prefix('persistent_cart/')->group(function(){
        Route::post('add_to_cart', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'addToCart']);
        Route::get('fetch_cart_items', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'index']);
        Route::post('add_new_shipping_address', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'updateCartCheckoutAddress']);
        Route::post('add_delivery_cost/{cart_id}', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'addDeliveryCost']);
        Route::delete('delete_cart_item/{cart_id}', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'deleteItem']);
        Route::delete('empty_cart', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'emptyCart']);

        Route::get('fetch_logistic_rating/{cart_id}', [App\Http\Controllers\API\Customer\CartCheckoutController::class, 'fetchLogisticRating']);

        Route::post('get_delivery_rate', [App\Http\Controllers\API\CartController::class, 'getDeliveryRate']);
    
         Route::post('logistics_rates', [App\Http\Controllers\API\Logistics\LogisticsController::class, 'logisticsRates']);
        Route::post('logistics_shipment', [App\Http\Controllers\API\Logistics\LogisticsController::class, 'logisticsShipment']);
    });

        Route::post('update_delivery_info', [App\Http\Controllers\API\CartController::class, 'updateDeliveryInfo']);

        
        Route::get('fetch_pickup_locations', [App\Http\Controllers\API\CartController::class, 'fetchPickupLocations']);
    });

});