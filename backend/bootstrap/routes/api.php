<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

# public api
Route::post('/login', 'AuthController@login');
Route::post('/register-workshop', 'AuthController@registerShop');
Route::post('/register-user', 'AuthController@registerUser');
Route::get('/makes', 'PublicMakeController@makes');
Route::get('/cities', 'PublicDictionaryController@cities');
Route::get('/spare-parts', 'PublicSparePartsController@spareParts');
Route::get('/main-services', 'PublicServicesController@mainServices');
Route::post('/mail', 'FeedbackController@sendFeedbackEmail');

/* Api protected routes */
Route::middleware('auth:api')->group(function() {
    /* Admin routes */
    Route::namespace('Admin')->prefix('admin')->group(function () {
        Route::get('administrators', 'AdminUsersController@admins')->middleware('role:admin');
        Route::post('administrators', 'AdminUsersController@createAdmin')->middleware('role:admin');
        Route::get('administrators/{userId}', 'AdminUsersController@admin')->middleware('role:admin');
        Route::patch('administrators/{userId}', 'AdminUsersController@editAdmin')->middleware('role:admin');
        Route::delete('administrators/{userId}', 'AdminUsersController@deleteAdmin')->middleware('role:admin');

        Route::get('customers', 'AdminCustomerController@customers')->middleware('role:admin,moderator');
        Route::post('customers', 'AdminCustomerController@createCustomer')->middleware('role:admin,moderator');
        Route::get('customers/{userId}', 'AdminCustomerController@customer')->middleware('role:admin,moderator');
        Route::patch('customers/{userId}', 'AdminCustomerController@editCustomer')->middleware('role:admin,moderator');
        Route::delete('customers/{userId}', 'AdminCustomerController@deleteCustomer')->middleware('role:admin,moderator');
        Route::get('customers/{userId}/requests', 'AdminCustomerController@customerRequests')->middleware('role:admin,moderator');
        Route::get('customers/{userId}/reviews', 'AdminCustomerController@customerReviews')->middleware('role:admin,moderator');

        Route::get('shops', 'AdminShopController@shops')->middleware('role:admin,moderator');
        Route::get('shops/{shopId}', 'AdminShopController@shop')->middleware('role:admin,moderator');
        Route::patch('shops/{shopId}', 'AdminShopController@editShop')->middleware('role:admin,moderator');
        Route::delete('shops/{shopId}', 'AdminShopController@deleteShop')->middleware('role:admin,moderator');
        Route::get('shops/{shopId}/reviews', 'AdminShopController@shopReviews')->middleware('role:admin,moderator');

        Route::get('requests', 'AdminRepairRequestController@requests')->middleware('role:admin,moderator');
        Route::get('requests/{requestId}', 'AdminRepairRequestController@request')->middleware('role:admin,moderator');
        Route::delete('requests/{requestId}', 'AdminRepairRequestController@deleteRequest')->middleware('role:admin,moderator');
        Route::get('requests/{requestId}/offers', 'AdminRepairRequestController@repairRequestOffers')->middleware('role:admin,moderator');

        Route::delete('offers/{id}', 'AdminRepairRequestController@deleteOffer')->middleware('role:admin,moderator');
    });

    Route::delete('feedback/{id}', 'WorkshopFeedbackController@deleteFeedback')->middleware('role:admin,moderator');

    /* Public routes  */
    Route::post('workshops/{workshopId}/feedback', 'WorkshopFeedbackController@createFeedback');
    Route::name(Authenticate::ROUTE_PUBLIC_PREFIX)->group(function () {
        Route::get('/role', 'AuthController@fetchRole')->name(Authenticate::ROUTE_ROLE_PREFIX);
        Route::get('workshops/{workshopId}/feedback', 'WorkshopFeedbackController@fetchWorkshopFeedback');
        Route::get('workshops/{workshopId}', 'ShopController@workshop');
        Route::get('workshops', 'ShopController@workshops');
        Route::get('feedback', 'WorkshopFeedbackController@latestFeedbacks');
    });

    /* Auth routes */
    Route::post('/logout', 'AuthController@logout');

    /* Offer routes */
    Route::get('/offers', 'OfferController@offers')
        ->middleware('role:workshop,admin');

    Route::post('/offers/{id}/decline', 'OfferController@declineWorkshopOffer')
        ->middleware('role:user,admin');

    Route::post('offers/{id}/accept', 'OfferController@acceptWorkshopOffer')
        ->middleware('role:user,admin');

    Route::get('/offers/{id}/workshops', 'OfferController@workshopsThroughOffers')
        ->middleware('role:user,admin');

    Route::post('repair-requests/{id}/close', 'OfferController@closeOffer')
        ->middleware('role:workshop,admin');

    Route::get('/repair-requests/{id}/applicant', 'OfferController@applicantWorkshop')
        ->middleware('role:user,admin');

    Route::post('/repair-requests/{id}/applicant/rating', 'RatingController@rateAppliedWorkshop')
        ->middleware('role:user,admin');

    Route::get('/repair-requests/{id}/offers', 'OfferController@repairRequestOfferWorkshops')
        ->middleware('role:workshop,user');

    Route::post('/repair-requests/{id}/offers', 'OfferController@makeOffer')
        ->middleware('role:workshop,admin');

    Route::delete('/repair-requests/{id}/offers', 'OfferController@cancelOffer')
        ->middleware('role:workshop,admin');

    Route::post('/repair-requests/{id}/specific/deny', 'RepairRequestController@denyIncomingRequest')
        ->middleware('role:workshop,admin');

    Route::post('/repair-requests/{id}/specific/accept', 'RepairRequestController@acceptIncomingRequest')
        ->middleware('role:workshop,admin');

    /* Repair request routes */
    Route::get('/repair-requests/self', 'RepairRequestController@userRepairRequests')
        ->middleware('role:user,admin');

    Route::post('/repair-requests/bidding', 'RepairRequestController@createBiddingRepairRequest')
        ->middleware('role:user,admin');

    Route::post('/repair-requests/specific', 'RepairRequestController@createSpecificRepairRequest')
        ->middleware('role:user,admin');

    Route::get('/repair-requests/bidding', 'RepairRequestController@workshopBiddingRepairRequests')
        ->middleware('role:workshop,admin');

    Route::get('/repair-requests/specific', 'RepairRequestController@workshopSpecificRepairRequests')
        ->middleware('role:workshop,admin');

    Route::post('/repair-requests/{id}/views', 'RepairRequestController@increaseUniqueViews')
        ->middleware('role:workshop,admin');

    Route::delete('/repair-requests/{id}', 'RepairRequestController@deleteRepairRequest')
        ->middleware('role:user,admin'); //@TODO

    Route::get('/repair-requests/{id}', 'RepairRequestController@repairRequest');

    /* Shop Profile Routes */
    Route::prefix('/profile')->group(function () {
        Route::get('basic', 'ShopSettingsController@basicSettings');
        Route::patch('basic', 'ShopSettingsController@updateBasicSettings');

        Route::get('services', 'ShopServiceController@mainServices');
        Route::patch('services', 'ShopServiceController@updateMainActiveServices');

        Route::get('additional-services', 'ShopServiceController@additionalServices');
        Route::patch('additional-services', 'ShopServiceController@updateAdditionalActiveServices');

        Route::get('payment-options', 'ShopPaymentOptionController@paymentOptions');
        Route::patch('payment-options', 'ShopPaymentOptionController@updatePaymentOptions');

        Route::get('makes', 'WorkshopMakeController@makes');
        Route::patch('makes', 'WorkshopMakeController@updateMakes');

        Route::get('spare-parts', 'ShopSparePartsController@spareParts');
        Route::patch('spare-parts', 'ShopSparePartsController@updateSpareParts');

        Route::get('schedule', 'ShopScheduleController@schedule');
        Route::patch('schedule', 'ShopScheduleController@updateSchedule');

        Route::get('warranty', 'ShopWarrantyController@warranty');
        Route::patch('warranty', 'ShopWarrantyController@updateWarranty');

        Route::get('logo', 'ShopImagesController@logo');
        Route::post('logo', 'ShopImagesController@logoUpload');

        Route::get('certificates', 'ShopImagesController@certificates');
        Route::post('certificates', 'ShopImagesController@certificatesUpload');

        Route::put('password', 'ShopSettingsController@updatePassword');
        Route::get('email', 'ShopSettingsController@email');
        Route::put('email', 'ShopSettingsController@updateEmail');
    });
});


