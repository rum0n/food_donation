<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
/*
|=====================================================
|               Frontend Routes
|=====================================================
*/
Route::get('/', 'FrontEndController@index')->name('home_page');
Route::get('/donation/{view}', 'FrontEndController@single_details')->name('donation_view');

Route::get('/campaigns', 'FrontEndController@ourCampaigns')->name('campaigns');
Route::get('/campaigns/details/{id}', 'FrontEndController@campaign_details')->name('campaign_details');

Route::post('/subscribe', 'FrontEndController@subscribe')->name('subscribe');



/*
|=====================================================
|               Social Routes
|=====================================================
*/
Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');


Auth::routes(['verify' => true]);



/*
|=====================================================
|               Admin Routes
|=====================================================
*/

Route::group(['as' => 'admin.','prefix' => 'admin', 'namespace' => 'Admin','middleware' => ['auth','admin']],function(){

    Route::get('/dashboard', 'AdminController@index')->name('dashboard');

    //    ===========User Control Routes======================
    Route::resource('/users', 'UserController');
    Route::get('/block/{users}', 'UserController@blockUnblock')->name('user_status');
    Route::get('/user/{id}/promote','UserController@promoteDemote')->name('promote_demote');


    //    ===========Food Type Routes======================
    Route::resource('/type', 'FoodTypeController');

    //    ===========Donation Control Routes======================
    Route::resource('/donations', 'DonationController');

    Route::post('/donation/{id}','DonationController@status')->name('donation_status');

    //    ===========Subscriber Routes======================
    Route::get('/subscriber','AdminController@subscriber')->name('subscriber');
    Route::get('/delete/{id}','AdminController@delete_subscriber')->name('delete_subscriber');

    //    ===========Our Campaign Routes======================
    Route::resource('our_campaign', 'OurCampaignController');

    //    ===========Messaging Routes======================
    Route::resource('/messages', 'MessageController');
});

/*
|-----------------------------------------------------
|               Admin Routes ends
|-----------------------------------------------------
*/


/*
|-----------------------------------------------------
|               Volunteer Routes
|-----------------------------------------------------
*/


Route::group(['as' => 'volunteer.','prefix' => 'volunteer', 'namespace' => 'Volunteer','middleware' => ['auth','volunteer']],function(){

    Route::get('/dashboard', 'VolunteerController@index')->name('dashboard');
    Route::get('/profile/edit', 'VolunteerController@edit')->name('edit');
    Route::post('/profile/{edit}', 'VolunteerController@update')->name('update');

    Route::get('/view/{edit}', 'VolunteerController@single_view')->name('single_view');

    Route::get('/donation/collect/{id}', 'VolunteerController@collect_donation')->name('collect_now');


});

/*
|-----------------------------------------------------
|               Volunteer Routes ends
|-----------------------------------------------------
*/


/*
|-----------------------------------------------------
|               User Routes
|-----------------------------------------------------
*/


Route::group(['as' => 'user.','prefix' => 'user', 'namespace' => 'User','middleware' => ['auth','user','verified']],function(){

    Route::get('/dashboard', 'UserController@index')->name('dashboard');

    Route::get('/dashboard/edit', 'UserController@edit')->name('edit');

    Route::post('/update/{id}', 'UserController@update')->name('update');

//    ===========Donation Routes======================
    Route::resource('/donate', 'DonationController');

    Route::get('/donate_now/{id}', 'DonationController@donate_now')->name('donate_now');

    Route::get('/donation_delete/{id}', 'DonationController@delete_donation')->name('delete_donation');

    Route::resource('/messages', 'MessageController');
});


/*
|-----------------------------------------------------
|               User Routes ends
|-----------------------------------------------------
*/