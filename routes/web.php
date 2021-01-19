<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Basic Routing
Route::get('/', function () {
    return view('index');
});

//Auth Routing
Auth::routes();

//Common Routing
Route::get('/home', 'HomeController@index')->name('home');

// User SignUp Route
Route::post('auth', 'Backend\UserRegisterController@registerAuth')->name('auth.store');

// Facebook Social Route
Route::get('login/{provider}', 'Auth\LoginController@facebookRedirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@facebookHandleProviderCallback');

// Google Social Route
Route::get('login/{provider}', 'Auth\LoginController@googleRedirectToProvider');
Route::get('login/{provider}/callback','Auth\LoginController@googleHandleProviderCallback');

// Admin Group Routing
Route::group(['as'=>'admin.','prefix'=>'admin/','namespace'=>'Backend\Admin','middleware'=>['auth','is_admin']], function(){

    //Admin Dashboard Route
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
    // Admin Profile Route
    Route::resource('profile', 'AdminProfileController');
    // User Route
    Route::resource('users', 'UserController');
    // Order Route
    Route::resource('order','AdminOrderController');
    // Free Trials Route
    Route::resource('freetrials','AdminFreeTrialController');
    // Specification Route
    Route::resource('specification','AdminSpecificationController');
    Route::resource('specifications','SpecificationCreateController');
    // User Record Route
    Route::resource('record/billing','AdminRecordBillingController');
    Route::resource('record/client','AdminRecordClientController');
    Route::resource('record/worker','AdminRecordWorkerController');
    // User Control Route
    Route::get('users/deactived/{id}', 'UserController@deactivedUser')->name('user.deactived');
    Route::get('users/actived/{id}', 'UserController@activedUser')->name('user.actived');
    Route::get('users/view/{id}', 'UserController@userView')->name('user.view');

});

// Client Group Routing
Route::group(['as'=>'client.','prefix'=>'client/','namespace'=>'Backend\Client','middleware'=>['auth','is_client']], function(){

    Route::get('dashboard', 'ClientController@dashboard')->name('dashboard');
    // Client Profile Route
    Route::resource('profile', 'ClientProfileController');
    // Order Route
    Route::resource('order','ClientOrderController');
    // Specification Route
    Route::resource('specification','ClientSpecificationController');
    // Specification Step by Step Route
    Route::resource('specification-stepbystep','ClientSpecificationStepbystepController');
    // Specification Marketplace Route
    Route::resource('specification-marketplace','ClientSpecificationMarketplaceController');
    // Client Account Controller
    Route::resource('account','ClientAccountController');
    // Client Order Feedback
    Route::get('feedback', 'ClientOrderFeedbackController@dashboard')->name('order.feedback');
    Route::get('feedback/{id}', 'ClientOrderFeedbackController@orderFeedback')->name('order.wise.feedback');

});


// Worker Group Routing
Route::group(['as'=>'worker.','prefix'=>'worker/','namespace'=>'Backend\Worker','middleware'=>['auth','is_worker']], function(){

    Route::get('dashboard', 'WorkerController@dashboard')->name('dashboard');
    // Worker Profile Route
    Route::resource('profile', 'WorkerProfileController');
    // Worker Order Route
    Route::resource('order','WorkerOrderController');
    Route::get('order/take-it/{id}','WorkerController@orderTakeIt')->name('order.take.it');
    // Route::resource('account','WorkerAccountController');
    Route::get('order/details/{id}', 'WorkerOrderController@orderDetails')->name('order.details');

});



