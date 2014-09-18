<?php 

class SessionsController extends BaseController {

	public function create()
	{
		if (Auth::check()) 
		{
			return Redirect::to('assistance');
		}

			return View::make('sessions.create');
	}

	public function store()
	{
		if (Auth::attempt(Input::only('user', 'password'))) 
		{
			return Redirect::to('assistance');
		}
			return "acceso incorrecto";
	}
	public function destroy()
	{
		Auth::logout();

		return Redirect::to('/');
	}
}

 ?>