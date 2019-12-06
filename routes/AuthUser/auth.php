<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('login','AuthController@login');
    Route::post('signup','AuthController@signup');
    Route::get('signup/activate/{token}','AuthController@signupActivate');
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('logout','AuthController@logout');
        Route::get('user','AuthController@user');
    });
});

Route::group(['prefix' => 'reset'],function () {
    Route::post('password/reset','ResetPasswordController@notificationReset');
    Route::get('password/change/{token}','ResetPasswordController@verificationAction');
    Route::post('password/save','ResetPasswordController@changesPassword');
});
