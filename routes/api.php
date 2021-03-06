<?php


Route::group(['prefix'     => 'advertisers'], function () {

    Route::get('/', 'CMS\AdvertiserController@index');
    Route::get('/{id}', 'CMS\AdvertiserController@show');
    Route::get('/{id}/campaigns', 'CMS\AdvertiserController@getCampaigns');
    Route::post('/{id}/campaigns', 'CMS\AdvertiserController@createCampaign');
    Route::put('/{id}/campaigns/{campaign_id}', 'CMS\AdvertiserController@updateCampaign');
    Route::get('/{id}/opportunities', 'CMS\AdvertiserController@getOpportunities');
    Route::get('/{id}/product_lines', 'CMS\AdvertiserController@getProductLines');
    Route::post('/{id}/product_lines', 'CMS\AdvertiserController@createProductLine');
    Route::put('/{id}/product_lines/{product_line_id}', 'CMS\AdvertiserController@updateProductLine');
});


Route::group(['prefix'     => 'age_ranges'], function () {

    Route::get('/', 'Market\AgeRangeController@index');
    Route::get('/{id}', 'Market\AgeRangeController@show');

});


Route::group(['prefix'     => 'countries'], function () {

    Route::get('/', 'Locations\CountryController@index');
    Route::get('/{id}', 'Locations\CountryController@show');

});


Route::group(['prefix'     => 'deliverable_types'], function () {

    Route::get('/', 'Market\DeliverableTypeController@index');
    Route::get('/{id}', 'Market\DeliverableTypeController@show');
});


Route::group(['prefix'     => 'fmtc_categories'], function () {

    Route::get('/', 'FMTC\CategoryController@index');
    Route::get('/{id}', 'FMTC\CategoryController@show');

});


Route::group(['prefix'     => 'fmtc_deal_types'], function () {

    Route::get('/', 'FMTC\DealTypeController@index');
    Route::get('/{id}', 'FMTC\DealTypeController@show');

});


Route::group(['prefix'     => 'fmtc_deals'], function () {

    Route::get('/', 'FMTC\DealController@index');
    Route::get('/{id}', 'FMTC\DealController@show');

});


Route::group(['prefix'     => 'fmtc_master_merchants'], function () {

    Route::get('/', 'FMTC\MasterMerchantController@index');
    Route::get('/{id}', 'FMTC\MasterMerchantController@show');
    Route::get('/{id}/domains', 'FMTC\MasterMerchantController@getDomains');
    Route::get('/{id}/opm', 'FMTC\MasterMerchantController@getOPM');
    Route::get('/{id}/program_details', 'FMTC\MasterMerchantController@getProgramDetails');

});


Route::group(['prefix'     => 'fmtc_merchants'], function () {

    Route::get('/', 'FMTC\MerchantController@index');
    Route::get('/{id}', 'FMTC\MerchantController@show');
    Route::get('/{id}/banners', 'FMTC\MerchantController@getBanners');

});


Route::group(['prefix'     => 'fmtc_networks'], function () {

    Route::get('/', 'FMTC\NetworkController@index');
    Route::get('/{id}', 'FMTC\NetworkController@show');

});


Route::group(['prefix'     => 'fmtc_opms'], function () {

    Route::get('/', 'FMTC\OPMController@index');
    Route::get('/{id}', 'FMTC\OPMController@show');

});


Route::group(['prefix'     => 'fmtc_program_details'], function () {

    Route::get('/', 'FMTC\ProgramDetailController@index');
    Route::get('/{id}', 'FMTC\ProgramDetailController@show');

});


Route::group(['prefix'     => 'gig_statuses'], function () {

    Route::get('/', 'Market\GigStatusController@index');
    Route::get('/{id}', 'Market\GigStatusController@show');
});


Route::group(['prefix'     => 'influencers'], function () {

    Route::get('/', 'CMS\InfluencerController@index');
    Route::get('/{id}', 'CMS\InfluencerController@show');
    Route::get('/{id}/billing_address', 'CMS\InfluencerController@getBillingAddress');
    Route::get('/{id}/favorite_merchants', 'CMS\InfluencerController@getFavoriteMerchants');
    Route::get('/{id}/network_connections', 'CMS\InfluencerController@getNetworkConnections');
    Route::get('/{id}/network_connections/{network_connection_id}/fields', 'CMS\InfluencerController@getNetworkConnectionFields');
    Route::get('/{id}/network_connections/{network_connection_id}/connect', 'CMS\InfluencerController@testNetworkConnection');
    Route::get('/{id}/spheres', 'CMS\InfluencerController@getSpheres');
});


Route::group(['prefix'     => 'networks'], function () {

    Route::get('/', 'Networks\NetworkController@index');
    Route::get('/{id}', 'Networks\NetworkController@show');
    Route::get('/{id}/fields', 'Networks\NetworkController@getFields');

});


Route::group(['prefix'     => 'outlets'], function () {

    Route::get('/', 'Outlets\OutletController@index');
    Route::get('/{id}', 'Outlets\OutletController@show');

});


Route::group(['prefix'     => 'opportunities'], function () {

    Route::get('/', 'Market\OpportunityController@index');
    Route::get('/{id}', 'Market\OpportunityController@show');
    Route::get('/{id}/bids', 'Market\OpportunityController@getBids');
    Route::get('/{id}/compensation_models', 'Market\OpportunityController@getCompensationModels');
    Route::get('/{id}/creatives', 'Market\OpportunityController@getCreatives');

});


Route::group(['prefix'     => 'platforms'], function () {

    Route::get('/', 'Market\PlatformController@index');
    Route::get('/{id}', 'Market\PlatformController@show');

});


Route::group(['prefix'     => 'portfolio_types'], function () {

    Route::get('/', 'Market\PortfolioTypeController@index');
    Route::get('/{id}', 'Market\PortfolioTypeController@show');
});



Route::group(['prefix'     => 'roles'], function () {

    Route::get('/', 'CMS\RoleController@index');
    Route::get('/{id}', 'CMS\RoleController@show');

});


Route::group(['prefix'     => 'sphere_categories'], function () {

    Route::get('/', 'Market\SphereCategoryController@index');
    Route::get('/{id}', 'Market\SphereCategoryController@show');

});


Route::group(['prefix'     => 'users'], function () {

    Route::get('/', 'CMS\UserController@index');
    Route::get('/me', 'CMS\UserController@me');
    Route::get('/{id}', 'CMS\UserController@show');
    Route::get('/{id}/roles', 'CMS\UserController@getRoles');

});