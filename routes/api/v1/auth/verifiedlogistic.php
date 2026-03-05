<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'securedVerifiedLogisticBusiness'], function () {

Route::prefix('logistics/verified/')->group(function(){

    Route::prefix('delivery/')->group(function(){

        Route::post('create_vehicle_info', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'createVehicleInfo']);
        Route::post('upload_vehicle_images/{vehicle_id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'uploadVehicleImages']);
        Route::put('update_vehicle_info/{vehicle_id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'updateVehicleInfo']);
        Route::get('fetch_vehicle_info', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'index']);
        Route::get('fetch_single_vehicle_info/{vehicle_id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'fetchSingleVehicleInfo']);
        Route::delete('delete_vehicle_info/{vehicle_id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'deleteVehicleInfo']);
      
        Route::get('fetch_order_delivery_requests', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'fetchOrderDeliveryRequests']);
        Route::get('fetch_single_order_delivery_request/{id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'fetchSingleOrderDeliveryRequest']);
    
        Route::post('accept_and_decline_order_delivery_request/{id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'acceptOrderDeliveryRequest']);
        Route::put('update_order_delivery_request_status/{id}', [App\Http\Controllers\API\Business\Logistic\DeliveryController::class, 'updateOrderDeliveryRequestStatus']);
        
    });

    
    Route::prefix('shipping/')->group(function(){

        Route::post('create_cargo_info', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'createCargoInfo']);
        Route::post('upload_cargo_images/{cargo_id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'uploadCargoImages']);
        Route::put('update_cargo_info/{cargo_id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'updateCargoInfo']);
        Route::get('fetch_cargo_info', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'index']);
        Route::get('fetch_single_cargo_info/{cargo_id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'fetchSingleCargoInfo']);
        Route::delete('delete_cargo_info/{cargo_id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'deleteCargoInfo']);
        Route::delete('delete_regional_group/{cargo_id}/{region_id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'deleteRegionalGroup']);
       
        Route::get('fetch_order_shipping_requests', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'fetchOrderShippingRequests']);
        Route::get('fetch_single_order_shipping_request/{id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'fetchSingleOrderShippingRequest']);
    
        Route::post('accept_and_decline_order_shipping_request/{id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'acceptOrderShippingRequest']);
        Route::put('update_order_shipping_request_status/{id}', [App\Http\Controllers\API\Business\Logistic\ShippingController::class, 'updateOrderShippingRequestStatus']);
        

    });
   

    });

});