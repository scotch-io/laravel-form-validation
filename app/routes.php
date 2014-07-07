<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// route to show the duck form
Route::get('ducks', function() 
{
	return View::make('duck-form');
});

// route to process the ducks form
Route::post('ducks', array('before' => 'csrf', function()
{

	// create the validation rules ------------------------
	$rules = array(
		'name'             => 'required', 						// just a normal required validation
		'email'            => 'required|email|unique:ducks', 	// required and must be unique in the ducks table
		'password'         => 'required',
		'password_confirm' => 'required|same:password' 			// required and has to match the password field
	);

	// create custom validation messages ------------------
	$messages = array(
		'required' => 'The :attribute is really really really important.',
		'same' 	=> 'The :others must match.'
	);

	// do the validation ----------------------------------
	// validate against the inputs from our form
	$validator = Validator::make(Input::all(), $rules, $messages);

	// check if the validator failed -----------------------
	if ($validator->fails()) {
		// redirect our user back with error messages		
		$messages = $validator->messages();

		// also redirect them back with old inputs so they dont have to fill out the form again
		// but we wont redirect them with the password they entered

		return Redirect::to('ducks')
			->withErrors($validator)
			->withInput(Input::except('password', 'password_confirm'));

	} else {
		// validation successful ---------------------------

		// our duck has passed all tests!
		// let him enter the database

		// create the data for our duck
		$duck = new Duck;
		$duck->name     = Input::get('name');
		$duck->email    = Input::get('email');
		$duck->password = Hash::make(Input::get('password'));

		// save our duck
		$duck->save();

		// redirect ----------------------------------------
		// redirect our user back to the form so they can do it all over again
		return Redirect::to('ducks')
			->with('messages', 'Hooray!');

	}

}));