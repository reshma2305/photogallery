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

//testing mail
Route::get('email','EmailController@index')->name('email');
Route::match(['get','post'],'email/send','EmailController@send')->name('email/send');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/admin')->namespace('Admin')->group(function(){
	//All admin routes 
	Route::match(['get','post'],'/','AdminController@login');
	Route::group(['middleware'=>['admin']],function(){
		Route::get('dashboard','AdminController@dashboard');
		Route::get('settings','AdminController@settings');
		Route::post('check-current-pwd','AdminController@chkCurrentPassword');
		Route::post('update-current-pwd','AdminController@updateCurrentPassword');
		Route::match(['get','post'],'update-admin-details','AdminController@updateAdminDetails');
		Route::get('logout','AdminController@logout');

		//event routes
		Route::get('events','EventController@event');
		Route::post('update-event-status','EventController@updateEventStatus');
		Route::match(['get','post'],'add-edit-event/{id?}','EventController@addEditEvent');
		Route::get('delete-event/{id}','EventController@deleteEvent');

		//album routes
		Route::get('albums','AlbumController@album');
		Route::post('update-album-status','AlbumController@updateAlbumStatus');
		Route::get('delete-album/{id}','AlbumController@deleteAlbum');
		Route::match(['get','post'],'add-edit-album/{id?}','AlbumController@addEditAlbum');
		Route::get('delete-album-image/{id}','AlbumController@deleteAlbumImage');

		//album Images
		Route::match(['get','post'],'add-images/{id}','AlbumController@addImages');
		Route::post('update-image-status','AlbumController@updateImageStatus');
		Route::get('delete-image/{id}','AlbumController@deleteImage');

		//album Videos
		Route::match(['get','post'],'add-videos/{id}','AlbumController@addVideos');

		//cms pages
		Route::get('cms-pages','CmsController@cms');
		Route::match(['get','post'],'add-edit-pages/{id?}','CmsController@addEditPages');
		Route::get('delete-cms/{id}','CmsController@deleteCmsPage');

		//Enquries
		Route::get('enquries','EnqurieController@enqurie');
		Route::post('update-enquiry-status','EnqurieController@updateEnquiryStatus');
		Route::get('old-enquiry-data','EnqurieController@oldEnquirydata');

		//services
		Route::get('services','ServiceController@services');
		Route::post('update-service-status','ServiceController@updateServiceStatus');
		Route::get('delete-service/{id}','ServiceController@deleteService');
		Route::match(['get','post'],'add-edit-service/{id?}','ServiceController@addEditService');
	});
	
});



//front Routes
Route::namespace('Front')->group(function(){

	Route::get('/','IndexController@index');
	Route::get('/gallery/{id}','IndexController@gallery');
	Route::get('/videos/{id}','IndexController@Videos');
	Route::match(['get','post'],'/contact','EnqurieController@contact');
	Route::match(['get','post'],'/about-us','IndexController@aboutus');
	Route::get('/services','IndexController@service');
	Route::get('/service-plans/{id}','IndexController@servicePlans');
});