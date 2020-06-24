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

Route::get('/test-winners', function() {
	return view('winners');
});

Route::domain('downloads.tesseractgnit.com')->group(function() {
	Route::get('/', function() {
		return redirect('https://www.tesseractgnit.com');
	});

	Route::get('/events/{event}/rules', function($event) {
		if($event == 'naveen-vidyarthi')
			return response()->download(public_path() . '/storage/rules/Tesseract_2k20_Naveen_Vidyarthi_Award.pdf');
		else
			return response()->download(public_path() . '/storage/rules/' . \App\Event::where('slug', $event)->firstOrFail()->rules);
	});

});

// Route::get('/', function() {
// 	return redirect('/admin/login');
// });

// test routing for pdf's
// Route::get('/teams', 'PDFController@generatePdfForTeam')->name('generatePdfForTeam');
// Route::get('/test', 'PDFController@generatePdfForTeam')->name('generatePdfForTeam');
// Route::get('/solo', 'PDFController@generatePdfSolo')->name('generatePdfSolo');

Route::get('test-test', function() {
	$recipients = [
			'soumyajit9051@gmail.com',
			'abhishekmaheshwari.01062000@gmail.com',
			'souhardyamanna77@gmail.com',
			'sayanikarmakar444@gmail.com',
			'moumita29kar@gmail.com',
			'shreejitbhattacharyya@gmail.com',
			'1trimbak@gmail.com',
			'ritesh.sanyal.mankar@gmail.com',
			'satyakisinhastar@gmail.com',
			'kathaghosh23@gmail.com',
			'aanchalguptakol@gmail.com',
			'bhattacharyyarup32@gmail.com',
			'asthaghosh911@gmail.com',
			'mariananikpal@gmail.com',
			'gsayantan01@gmail.com',
			'das.soumava@gmail.com',
			'arthamrocks@gmail.com',
			'dassohom5@gmail.com',
			'kushalbanik93@gmail.com',
			'robosapienz18@gmail.com',
			'robosapienz18@gmail.com',
			'robosapienz18@gmail.com',
			'robosapienz18@gmail.com',
			'robosapienz18@gmail.com',
			'avikboseofficial1999@gmail.com',
			'avikboseofficial1999@gmail.com',
			'avikboseofficial1999@gmail.com',
			'avikboseofficial1999@gmail.com',
			'aritrarakshit1@gmail.com',
			'aritrarakshit1@gmail.com',
			'aritrarakshit1@gmail.com',
			'aritrarakshit1@gmail.com',
			'smitabhushan58@gmail.com',
			'pratikshad2000@gmail.com',
			'jeetchakraborty2000@gmail.com',
			'raunak.chakraborty123@gmail.com',
			'duttasubhajit956@gmail.com',
			'sdhang1999@gmail.com',
			'etimukhetjee73@gmail.com',
			'patrashuvam53@gmail.com',
			'samarjitkundu99@gmail.com',
			'madhabikundu008@gmail.com',
			'dibyendusaha388@gmail.com',
			'sattyajitt1997@gmail.com',
			'kaustabhadak30@gmail.com',
			'pujapalodhi@gmail.com',
			'akashsamanta100@gmail.com',
			'samibanerjee1@gmail.com',
			'shubhrajitpallob@gmail.com',
			'sagar.argon92@gmail.com',
			'rounakghosh42@gmail.com',
			'romikbanerjee2512@gmail.com',
			'sayak2000saha@gmail.com',
			'sayanmajumder666@gmail.com',
			'uddipanc0@gmail.com',
			'bhowmicksayan0001@gmail.com',
			'91mondal.sayan@gmail.com',
			'1999rittikachakraborty@gmail.com',
			'nm7278490606@gmail.com',
			'mukherjeerumon26@gmail.com',
			'1904088@kiit.ac.in',
			'1904219@kiit.ac.in',
			'19042387@kiit.ac.in',
			'1904387@kiit.ac.in',
			'parthib2001@gmail.com',
			'sohamvictorfernandez@gmail.com',
			'romitroy1999@gmail.com',
			'bhattacharjeesayan1099@gmail.com',
			'anish1999das@gmail.com',
			'alangkrita9876@gmail.com',
			'lipikamukherjee99@gmail.com',
			'tua3642@gmail.com',
			'jayashreesarkar1999@gmail.com',
			'amartyaduttabanik@gmail.com',
			'sangram.2015patra@gmail.com',
			'mail420pritamsamanta@gmail.com',
			'adrijaspriha.16@gmail.com',
			'mrohit724@gmail.com',
			'amartyaduttabanik@gmail.com',
			'sangram.2015patra@gmail.com',
			'mail420pritamsamanta@gmail.com',
			'adrijaspriha.16@gmail.com',
			'mrohit724@gmail.com',
			'arnabdas199920@gmail.com',
			'pralayghoshg9@gmail.com',
			'debjyotighosh9711@gmail.com',
			'arnab0553@gmail.com',
			'akashroydtk22@gmail.com',
			'sagar.argon92@gmail.com',
			'romikbanerjee2512@gmail.com',
			'rounakghosh42@gmail.com',
			'sayak2000saha@gmail.com',
			'shubhrajitpallob@gmail.com',
			'sagnikbhowmik00@gmail.com',
			'shreya7.roy@gmail.com',
			'roysouradeep2000@gmail.com',
			'soumyabiswassb@gmail.com',
			'1082002vibhavsingh@gmail.com',
			'1904387@kiit.ac.in',
			'1904088@kiit.ac.in',
			'1904219@kiit.ac.in',
			'rishadey2016@gmail.com',
			'digantadutta96@gmail.com',
			'deepbanerjee68@gmail.com'
		];

		$participants = \App\Participant::whereIn('email', $recipients)->get();

		dd($participants->count());
		return "Kya bantai";
});

Route::get('test', function() {
	// $orders = [390];

	// foreach($orders as $o) {
	// 	$order = \App\Order::findOrFail($o);
	// 	Mail::to($order->team->leader->email)->send(new \App\Mail\TeamRegistered($order));
	// 	//Mail::to($order->participant->email)->send(new \App\Mail\ParticipantRegistered($order));
	// }
	// return 'Done';

	// $emails = ['farazappy@gmail.com', 'farazappy@esportsindia.in', 'farazappy@thebuglabs.com', 'shourochat@gmail.com', 'shourochat@hotmail.com', 'avikavikavikavik1234@gmail.com', 'subhamay.may@gmail.com', 'saswata@thebuglabs.com', 'saswata032@gmail.com', 'supriyo.das@thebuglabs.com', 'supriyo15998@gmail.com', 'sandipan.sau99@gmail.com', 'sandipan@thebuglabs.com'];

	// foreach($emails as $email)
	// 	Mail::to($email)->send(new \App\Mail\TestMail());

	$orders = \App\Order::whereHas('events', function($q) { $q->where('played', 1)->whereIn('event_id', [3, 4, 5, 6, 7]); })->whereHas('team', function($q) { $q->where('is_naveen', 0);})->get();

	// $o = $orders[0];
	
	// if($o->is_team) {
	// 	$participant = $o->team->members[0];
	// 	if($o->team->is_naveen)
	// 		Mail::to('farazappy@gmail.com')->send(new \App\Mail\NaveenCertificate($participant));
	// 	else
	// 		Mail::to('farazappy@gmail.com')->send(new \App\Mail\ParticipationCertificate($o->events, $participant));

	// } else {
	// 	Mail::to('farazappy@gmail.com')->send(new \App\Mail\ParticipationCertificate($o->events, $o->participant));
	// }
	

	// foreach($orders as $o) {

	// 	if($o->is_team) {
	// 		foreach($o->team->members as $participant) {
	// 			if($o->team->is_naveen)
	// 				Mail::to($participant->email)->send(new \App\Mail\NaveenCertificate($participant));
	// 			else
	// 				Mail::to($participant->email)->send(new \App\Mail\ParticipationCertificate($o->events, $participant));
	// 		}
	// 	} else {
	// 		Mail::to($o->participant->email)->send(new \App\Mail\ParticipationCertificate($o->events, $o->participant));
	// 	}
	// }

	return 'Done';
});

Route::get('qr-code', function () {
  return QRCode::text('QR Code Generator for Laravel')->url();    
});

Route::prefix('admin')->group(function () {
	Auth::routes(['register' => false]);
	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/volunteers-list', 'HomeController@getVolunteers')->name('getVolunteers');
	Route::get('/add-event', 'HomeController@viewEventForm')->name('viewEventForm');
	Route::get('/show-participants', 'HomeController@viewTeams')->name('viewParticipants');
	Route::get('/show-naveen', 'HomeController@viewNaveen')->name('viewNaveen');
	Route::get('/show-solo', 'HomeController@viewSolo')->name('viewSolo');
	Route::get('/orders/{orderId}/details', 'HomeController@orderDetails')->name('orderDetails');
	Route::post('/event', 'HomeController@registerEvent')->name('registerEvent');
	Route::get('/event/list', 'HomeController@showEvent')->name('showEvent');
	Route::get('/campuss-ambassador/list', 'HomeController@showCampussAmbassadors')->name('showCampussAmbassadors');
	Route::get('/export/volunteers', 'HomeController@exportVolunteers')->name('exportVolunteers');
	Route::get('/export/orders', 'HomeController@exportOrdersGet')->name('exportOrdersGet');
	Route::post('/export/orders', 'HomeController@exportOrdersPost')->name('exportOrdersPost');
	Route::get('/export/naveen', 'HomeController@exportNaveen')->name('exportNaveen');
	Route::get('/export/attendance', 'HomeController@exportAttendance')->name('exportAttendance');
	Route::get('/export/attendance/events', 'HomeController@exportAttendanceEventsGet')->name('exportAttendanceEventsGet');
	Route::post('/export/attendance/events', 'HomeController@exportAttendanceEventsPost')->name('exportAttendanceEventsPost');
});


//certificates test
Route::get('/test-volunteer', function() {

	$pdf = \PDF::loadView('pdf.volunteer')->setPaper('a4', 'landscape');
	// \Mail::to('saswata032@gmail.com')->send(new App\Mail\VolunteerCertificate());
	return $pdf->stream('volunteer.pdf');
	//return view('pdf/volunteer');
	echo "Done";
});

Route::get('/test-participant', function() {

	$orders = \App\Order::whereHas('events', function($q) { $q->where('played', 1)->whereIn('event_id', [3, 4, 5, 6, 7]); })->whereHas('team', function($q) { $q->where('is_naveen', 0);})->get();

	$o = $orders[0];


	$pdf = \PDF::loadView('pdf.participant', ['participant' => $o->team->members[0], 'event' => $o->events[0]])->setPaper('a4', 'landscape');
	//\Mail::to('supriyo15998@gmail.com')->send(new App\Mail\ParticipationCertificate());
	return $pdf->stream('participant.pdf');
	//return view('pdf.participant', ['participant' => \App\Participant::firstOrFail(), 'event' => \App\Event::firstOrFail()]);
	echo "Done";
});

// Route::group(['prefix' => 'admin'], function () {
//     Voyager::routes();
// });