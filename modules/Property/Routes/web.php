<?php

use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Route;


Route::group(['prefix' => config('property.property_route_prefix')], function () {


//    $latitude = "51.528564";
//    $longitude = "-0.203010";
//
//    $shops = DB::table("bravo_properties");
        //
        //    $shops = $shops->select("*", DB::raw("6371 * acos(cos(radians(" . $latitude . "))
        //                                * cos(radians(map_lat)) * cos(radians(map_lng) - radians(" . $longitude . "))
        //                                + sin(radians(" . $latitude . ")) * sin(radians(map_lat))) AS distance"));
        //    $shops = $shops->having('distance', '<', 20);
//    $shops = $shops->orderBy('distance', 'asc');
//
//    dd($shops->get()  );


    Route::get('/', 'PropertyController@index')->name('property.search'); // Search
    Route::get('/{slug}', 'PropertyController@detail')->name('property.detail');// Detail


});


Route::group(['prefix' => 'user/' . config('property.property_route_prefix'), 'middleware' => ['auth', 'verified']], function () {
    Route::match(['get'], '/', 'ManagePropertyController@manageProperty')->name('property.vendor.index');
    Route::match(['get'], '/create', 'ManagePropertyController@createProperty')->name('property.vendor.create');
    Route::match(['get'], '/edit/{id}', 'ManagePropertyController@editProperty')->name('property.vendor.edit');
    Route::match(['get', 'post'], '/del/{id}', 'ManagePropertyController@deleteProperty')->name('property.vendor.delete');

    Route::match(['post'], '/store/{id}', 'ManagePropertyController@store')->name('property.vendor.store');
    Route::get('bulkEdit/{id}', 'ManagePropertyController@bulkEditProperty')->name("property.vendor.bulk_edit");
    Route::get('/booking-report', 'ManagePropertyController@bookingReport')->name("property.vendor.booking_report");
    Route::get('/booking-report/bulkEdit/{id}', 'ManagePropertyController@bookingReportBulkEdit')->name("property.vendor.booking_report.bulk_edit");
    Route::get('clone/{id}', 'ManagePropertyController@cloneProperty')->name("property.vendor.clone");
});

Route::group(['prefix' => 'user/' . config('property.property_route_prefix')], function () {
    Route::group(['prefix' => 'availability'], function () {
        Route::get('/', 'AvailabilityController@index')->name('property.vendor.availability.index');
        Route::get('/loadDates', 'AvailabilityController@loadDates')->name('property.vendor.availability.loadDates');
        Route::match(['post'], '/store', 'AvailabilityController@store')->name('property.vendor.availability.store');
    });
});
