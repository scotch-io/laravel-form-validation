<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function showDuckForm()
	{
		return View::make('duck-form');
	}

	public function doDuckForm()
	{

		// create the validation rules
		$rules = array(
			'name' => 'required', 					// just a normal required validation
			'email' => 'required|unique:ducks', 	// required and must be unique in the ducks table
			'feathers' => 'required|integer', 		// required and must be a solid number (decimals use numeric)
			'password' => 'required',
			'password_confirm' => 'required|same:password' 	// required and has to match the password field
		);

		// validate against the inputs from our form
		$validator = Validator::make(Input::all(), $rules);

		// check if the validator failed
		if ($validator->fails())
		{
			// create custom error messages

			// redirect our user back with error messages
			// also redirect them back with old inputs so they dont have to fill out the form again
			// but we wont redirect them with the password they entered
			

		}
		else
		{
			// our duck has passed all tests!
			// let him enter the database

			// create the data for our duck
			$duckData = array(
				'name' => Input::get('name'),
				'email' => Input::get('email'),
				'feathers' => Input::get('feathers'),
				'password' => Hash::make(Input::get('password'))
			);

			// save our duck
			$duck->save();

			// redirect our user back to the form so they can do it all over again
			return Redirect::to('ducks');

		}

	}

}
