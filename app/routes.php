<?php

Route::get('/', 'SessionsController@create');
Route::post('store', 'SessionsController@store');
Route::get('logout', 'SessionsController@destroy');

Route::get('assistance', function()
{
	return View::make('assistance.index');

})->before('auth');

Route::get('crear', function(){
	$user = new User;
	$user->user = "Fernando";
	$user->password= Hash::make('Fernando2014');
	$user->save();

	return "Usuario Creado";
});


Route::get('test', function(){
	$checkin = new Checkin();
	$checkin->user_id = 1;
	$checkin->fecha = date('1994-04-26');
	$checkin->save();


});

Route::get('test2', function(){
	$user = User::find(1);
	$checkins = $user->checkins;
	$checkouts = $user->checkouts;


	$lista = '<div style="display:inline-block"><h2>Checkins</h2><ul>';
	foreach ($checkins as $item) {
		$lista .='<li>';
		$lista .= '<h2 style="display:inline-block;">' . $item['fecha'] . '</h2>'."-----";
		$lista .= '</li>';
	}
	$lista .= '</ul></div>';

	$lista2 = '<div style="display:inline-block"><h2>Checkouts</h2><ul>';
	foreach ($checkouts as $item2) {
		$lista2 .='<li>';
		$lista2 .= '<h2>' . $item2['fecha'] . '</h2>';
		$lista2 .= '</li>';
	}
	$lista2 .= '</ul></div>';

	return "<h2>" .$user->user . "</h2>"  . $lista . $lista2;
});