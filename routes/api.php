<?php


Route::group(['prefix'     => 'advertisers'], function () {

    Route::get('/', 'CMS\AdvertiserController@index');
    Route::get('/{id}', 'CMS\AdvertiserController@show');
    Route::get('/{id}/campaigns', 'CMS\AdvertiserController@getCampaigns');
    Route::get('/{id}/opportunities', 'CMS\AdvertiserController@getOpportunities');
    Route::get('/{id}/product_lines', 'CMS\AdvertiserController@getProductLines');
});


Route::group(['prefix'     => 'age_ranges'], function () {

    Route::get('/', 'Market\AgeRangeController@index');
    Route::get('/{id}', 'Market\AgeRangeController@show');

});


Route::group(['prefix'     => 'campaigns'], function () {

    Route::get('/', 'Market\CampaignController@index');
    Route::get('/{id}', 'Market\CampaignController@show');
});


Route::group(['prefix'     => 'countries'], function () {

    Route::get('/', 'Locations\CountryController@index');
    Route::get('/{id}', 'Locations\CountryController@show');

});


Route::group(['prefix'     => 'deliverable_types'], function () {

    Route::get('/', 'Market\DeliverableTypeController@index');
    Route::get('/{id}', 'Market\DeliverableTypeController@show');
});


Route::group(['prefix'     => 'influencers'], function () {

    Route::get('/', 'CMS\InfluencerController@index');
    Route::get('/{id}', 'CMS\InfluencerController@show');
    Route::get('/{id}/billing_address', 'CMS\InfluencerController@getBillingAddress');
    Route::get('/{id}/favorite_merchants', 'CMS\InfluencerController@getFavoriteMerchants');
    Route::get('/{id}/network_connections', 'CMS\InfluencerController@getNetworkConnections');
    Route::get('/{id}/spheres', 'CMS\InfluencerController@getSpheres');
});


Route::group(['prefix'     => 'network_connections'], function () {

    Route::get('/', 'Networks\NetworkConnectionController@index');
    Route::get('/{id}', 'Networks\NetworkConnectionController@show');

});


Route::group(['prefix'     => 'networks'], function () {

    Route::get('/', 'Networks\NetworkController@index');
    Route::get('/{id}', 'Networks\NetworkController@show');
    Route::get('/{id}/fields', 'Networks\NetworkController@getFields');

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


Route::group(['prefix'     => 'platforms'], function () {

    Route::get('/', 'Market\PlatformController@index');

});


Route::group(['prefix'     => 'portfolio_types'], function () {

    Route::get('/', 'Market\PortfolioTypeController@index');
    Route::get('/{id}', 'Market\PortfolioTypeController@show');
});


Route::group(['prefix'     => 'product_lines'], function () {

    Route::get('/', 'Market\ProductLineController@index');
    Route::get('/{id}', 'Market\ProductLineController@show');
});


Route::group(['prefix'     => 'roles'], function () {

    Route::get('/', 'CMS\RoleController@index');
    Route::get('/{id}', 'CMS\RoleController@show');

});


Route::group(['prefix'     => 'sphere_categories'], function () {

    Route::get('/', 'Market\SphereCategoryController@index');
    Route::get('/{id}', 'Market\SphereCategoryController@show');

});


Route::group(['prefix'     => 'spheres'], function () {

    Route::get('/', 'Market\SphereController@index');
    Route::get('/{id}', 'Market\SphereController@show');
    Route::get('/{id}/categories', 'Market\SphereController@getCategories');
    Route::post('/{id}/categories/{sphere_category_id}', 'Market\SphereController@addCategory');
    Route::delete('/{id}/categories/{sphere_category_id}', 'Market\SphereController@deleteCategory');

});


Route::group(['prefix'     => 'users'], function () {

    Route::get('/', 'CMS\UserController@index');
    Route::get('/{id}', 'CMS\UserController@show');
    Route::get('/{id}/roles', 'CMS\UserController@getRoles');

});