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
	
	return View::make('flightplans');
	
});


// Route::get('sample', function()
// {
	// $file= public_path(). '\download' . '\10.png';
	// $file = url("http://d13yacurqjgara.cloudfront.net/users/78637/screenshots/1484134/pastel_projects_1x.jpg");
	// $headers = array('Content-Type'=>'image/jpeg','Content-Disposition'=>'attachment');
	// readfile($file);
// });

// Route::get('/', function()
// {
	// return View::make('home');
// });

Route::any('loadwaypoint',function(){
	
	$waypoints = Waypoints::all();
	return $waypoints;
	
});

Route::any('createwaypoint',function(){
	return View::make('createwaypoint');
});

Route::any('addwaypoint',function(){
	$waypoint = new Waypoints;
	$waypoint->lat = Input::get('lat');
	$waypoint->lng = Input::get('lng');
	$waypoint->save();
});