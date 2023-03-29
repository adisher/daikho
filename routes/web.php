<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes([

    'register' => false, // Register Routes...
  
    'reset' => false, // Reset Password Routes...
  
    'verify' => false, // Email Verification Routes...
  
  ]);
  Route::get('/home', 'HomeController@index')->name('home');
  Route::group(['middleware' => ['auth','checkAdmin']], function () {

   // Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

   Route::get('/report', 'ReportController@index')->name('report')->middleware('checkAdmin');
   Route::get('/detailedreport', 'ReportController@detailedreport')->name('detailedreport');
   Route::get('/getdetailedreport','ReportController@getdetailedreport')->name('getdetailedreport');
   Route::get('/getreport','ReportController@getreport')->name('getreport')->middleware('checkAdmin');
   Route::get('/report/{id}/edit','ReportController@editreport')->name('editreport')->middleware('checkAdmin');
   Route::post('/report/{id}/update','ReportController@updatereport')->name('updatereport')->middleware('checkAdmin');
   Route::get('/reportideation', 'ReportController@reportideation')->name('reportideation')->middleware('checkAdmin');
   Route::get('/getideationreport','ReportController@getideationreport')->name('getideationreport')->middleware('checkAdmin');
   Route::post('/updateStatus/{id}','ReportController@updateStatus')->name('updateStatus')->middleware('checkAdmin');
   Route::get('/smsunsubreport','ReportController@smsunsub')->name('smsunsub')->middleware('checkAdmin');
   Route::get('/getsmsreport','ReportController@smsreport')->name('getsmsreport')->middleware('checkAdmin');
   Route::get('/unsubreport','UnsubController@unsubreport')->name('unsubreport')->middleware('checkAdmin');
   Route::get('/getunsubreport','UnsubController@getunsubreport')->name('getunsubreport')->middleware('checkAdmin');
   Route::get('/user-record','UserController@userRecord')->name('user-record')->middleware('checkAdmin');
   Route::get('/getuserrecord','UserController@getuserRecord')->name('getuserrecord')->middleware('checkAdmin');
//    Route::get('/q','UserController@getuserRecord');
   

});


Route::resource('/marketing-urls', 'MarketingCampaignsController');

Route::get('/bulkunsub', 'UserController@bulkUnsub')->name('bulkunsub');
Route::post('/fileunsub', 'UserController@fileUnsub')->name('fileunsub');

Route::get('/get-unsub', 'UserController@getUnsub')->name('get-unsub');
Route::get('/unsub', 'UserController@unsub')->name('unsub');
Route::get('/get-user', 'UserController@getUser')->name('get-user');


Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/deikho-report', 'DeikhoController@index')->name('deikho-report')->middleware('CheckDeikho');
    Route::get('/getdeikhoreport','DeikhoController@show')->name('getdeikhoreport');
    
});
