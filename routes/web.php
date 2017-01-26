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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('check_email',function()
// {
// 	$data['header_banner'] = 'https://getcomposer.org/img/logo-composer-transparent2.png';
// 	$data['header_image'] = 'https://community-cdn-digitalocean-com.global.ssl.fastly.net/assets/tutorials/images/large/Google-SMTP-Server-TW-V4.png?1446592743';
// 	$data['text_paragraph'] = "A little-known feature about Gmail and Google Apps email is Google's portable SMTP server. ";
// 	$data['link_to'] = 'https://getcomposer.org/';
// 	$data['link_text'] = 'Go to Composer';

// 	return view('emails.hello')->with($data);
// });


// Route::get('send',function()
// {
// 	$data['header_banner'] = 'https://getcomposer.org/img/logo-composer-transparent2.png';
// 	$data['header_image'] = 'https://community-cdn-digitalocean-com.global.ssl.fastly.net/assets/tutorials/images/large/Google-SMTP-Server-TW-V4.png?1446592743';
// 	$data['text_paragraph'] = "A little-known feature about Gmail and Google Apps email is Google's portable SMTP server. ";
// 	$data['link_to'] = 'https://getcomposer.org/';
// 	$data['link_text'] = 'Go to Composer';


	Mail::send('emails.hello',$data,function ($m)
	{
		//set from email
		$m->from('basecampsoftware@gmail.com','Arief Setya');
		//set recipient
		$m->to('ariefsetya@live.com');
		//set subject
		$m->subject('Hello from World! '.gethostname().' Nama Absen');
		//set carbon copy
		$m->cc('arief@tu-kang.com');
		//set blind carbon copy
		$m->bcc('email@mailinator.com');
		//set reply-to
		$m->replyTo('hello@mailinator.com');


		//attach file
		$m->attach(storage_path('bakekok.jpg'));

	});

// 	echo "sent";

// 	// Mail::send(view, parameter_ke_view, function(variable_email){
// 		// $m->from(email_pengirim,nama_pengirim);
// 		// $m->to(email_tujuan);
// 		// $m->subject(subject_email);
// 		// $m->cc(email_cc);
// 		// $m->bcc(email_bcc);
// 		// $m->replyTo(email_untuk_balasan);
// 		// $m->attach(file_attachment_path);
// 	// });

// });


// Route::group(['prefix'=>'admin'],function ()
// {
// 	Route::group(['prefix'=>'country'],function()
// 	{
// 		Route::get('add',function(){echo "ini add country";});// /admin/country/add
// 		Route::get('index',function(){echo "ini index country";});// /admin/country/index
// 		Route::get('edit',function(){echo "ini edit country";});// /admin/country/edit
// 	});
// 	Route::group(['prefix'=>'province'],function()
// 	{
// 		Route::get('add',function(){echo "ini add province";});
// 		Route::get('edit',function(){echo "ini edit province";});
// 		Route::get('show',function(){echo "ini show province";});
// 	});
// });

Route::resource('/admin/country','Controller',['only'=>['create','store']]);
Route::resource('/admin/province','Controller',['except'=>['edit']]);