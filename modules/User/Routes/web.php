<?php

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Route;
Auth::routes(['verify' => true]);
Route::group(['prefix'=>'user','middleware' => ['auth','verified']],function(){
    Route::match(['get'],'/dashboard','UserController@dashboard')->name("vendor.dashboard");

    Route::get('/service','ServiceController@index')->name("user.service.index");


    Route::post('/reloadChart','UserController@reloadChart');

    Route::get('/showContact', 'UserController@showContact')->name('user.showContact');
    Route::get('/showContactNew', 'UserController@showContactNew')->name('user.showContactNew');

    Route::match(['get'],'/profile','UserController@profile')->name("user.profile.index");
    Route::post('/profile_post','UserController@profile_post')->name("user.profile.profile_post");
    Route::match(['get'],'/profile/change-password','UserController@changePassword')->name("user.change_password");
    Route::post('/profile/change-password-post','UserController@changePasswordPost')->name("user.change_password_post");
    Route::get('/booking-history','UserController@bookingHistory')->name("user.booking_history");
    Route::get('/enquiry-report','UserController@enquiryReport')->name("vendor.enquiry_report");
    Route::get('/enquiry-report/bulkEdit/{id}','UserController@enquiryReportBulkEdit')->name("vendor.enquiry_report.bulk_edit");

    Route::post('/wishlist','UserWishListController@handleWishList')->name("user.wishList.handle");
    Route::get('/wishlist','UserWishListController@index')->name("user.wishList.index");
    Route::get('/wishlist/remove','UserWishListController@remove')->name("user.wishList.remove");

    Route::group(['prefix'=>'verification'],function(){
        Route::match(['get'],'/','VerificationController@index')->name("user.verification.index");
        Route::match(['get'],'/update','VerificationController@update')->name("user.verification.update");
        Route::post('/store','VerificationController@store')->name("user.verification.store");
        Route::post('/send-code-verify-phone','VerificationController@sendCodeVerifyPhone')->name("user.verification.phone.sendCode");
        Route::post('/verify-phone','VerificationController@verifyPhone')->name("user.verification.phone.field");
    });

    Route::group(['prefix'=>'/booking'],function(){
        Route::get('{code}/invoice','BookingController@bookingInvoice')->name('user.booking.invoice');
        Route::get('{code}/ticket','BookingController@ticket')->name('user.booking.ticket');
    });

    Route::match(['get'],'/upgrade-vendor','UserController@upgradeVendor')->name("user.upgrade_vendor");
});

//Route::group(['prefix'=>'profile'],function(){
//Route::match(['get'],'/{id}','ProfileController@profile')->name("user.profile");
//Route::match(['get'],'/{id}/reviews','ProfileController@allReviews')->name("user.profile.reviews");
//Route::match(['get'],'/{id}/services','ProfileController@allServices')->name("user.profile.services");
//});

//Newsletter
Route::post('newsletter/subscribe','UserController@subscribe')->name('newsletter.subscribe');
