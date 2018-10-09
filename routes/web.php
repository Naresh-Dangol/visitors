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

Route::get('/', function () {
  return redirect('home');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/visitors/today','HomeController@todayVisitorsList');
Route::get('/visitors/waiting','HomeController@visitorsOnWaiting');
Route::get('/visitors/nextAppointment','HomeController@visitorsForNextAppointment');
Route::get('/add-visitors-purpose/{id}','VisitorsController@addVisitorsPurpose')->name('visitors.add_purpose');

Route::get('/edit-visitors-purpose/{id}','VisitorsController@editVisitorsPurpose')->name('visitors.edit_purpose');
Route::post('/update-visitors-purpose/{id?}','VisitorsController@updateVisitorsPurpose')->name('visitors.update_purpose');

Route::post('/add-visitor','VisitorsController@storePurpose');
Route::post('visitors/search','VisitorsController@search')->name('visitor.search');

Route::get('/visitors/getSatisfaction/{id}','VisitorsController@getSatisfactionReason');

Route::get('/visitors/getVisitor','VisitorsController@getVisitorReport');

 Route::get('/add-more-visitors/{id}','VisitorsController@add_more_visitors')->name('visitors.add_more');
 Route::post('/add-more','VisitorsController@visitorStore')->name('visitors.add');

 Route::get('/visitors','VisitorsController@filter_data');
 Route::post('visitors/daterange','VisitorsController@daterange');


 Route::resource('visitors', 'VisitorsController');

 
 


 Route::get('visitor-notification/{visitor_id}','NotificationController@sendNotification')->name('visitor-notification');



Route::get('/global-setting','GlobalSettingController@global_setting');
//Route::post('/global-setting','GlobalSettingController@create')->name('create.global-setting');

Route::post('/global_setting','GlobalSettingController@updateSettings')->name('update.global_setting');

 Route::resource('visitorDetails', 'VisitorDetailsController');

Route::resource('visitorRecords', 'VisitorRecordController');
Route::resource('records', 'RecordController');



