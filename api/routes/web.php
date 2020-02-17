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

// Route::get('/', 'Auth\\LoginController@showLoginForm')->name('login');

Route::domain('downloads.tesseractgnit.com')->group(function() {
	Route::get('/', function() {
		return redirect('https://www.tesseractgnit.com');
	});

	Route::get('/events/{event}/rules', function($event) {
		return response()->download(public_path() . '/storage/rules/' . \App\Event::where('slug', $event)->firstOrFail()->rules);
	});

});

Route::get('/', function() {
	return redirect('/admin/login');
});

Route::prefix('admin')->group(function () {
	Auth::routes(['register' => false]);
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/volunteers-list', 'HomeController@getVolunteers')->name('getVolunteers');
	Route::get('/add-event', 'HomeController@viewEventForm')->name('viewEventForm');
	Route::get('/show-participants', 'HomeController@viewParticipants')->name('viewParticipants');
	Route::post('/event', 'HomeController@registerEvent')->name('registerEvent');
	Route::get('/event/list', 'HomeController@showEvent')->name('showEvent');
	Route::get('/campuss-ambassador/list', 'HomeController@showCampussAmbassadors')->name('showCampussAmbassadors');
});


