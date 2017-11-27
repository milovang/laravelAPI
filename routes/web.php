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
    return view('welcome');
});

//return Coaches page
Route::get('/coach', function () {

    $players = \App\Players::all();
    $coaches = \App\Coaches::all();

    return view('coach', compact('players', 'coaches'));
});

//return Compete page
Route::get('/compete', function () {

    $teams = \App\Teams::all();
    $coaches = \App\Coaches::all();

//    $competes = \App\TeamCompete::all();

    $competes = \App\TeamCompete::orderBy('iWon', 'DESC')->get();

    return view('compete', compact('teams', 'coaches', 'competes'));
});


//return Players page
Route::get('/players', function () {

    $players = \App\Players::orderBy('country_name', 'ASC')->get();

    return view('players', compact('players'));
});


//run soap script to get data from web service and insert it in db
Route::get('/soapInsert', function () {

    return view('soap.soapInsert');
});
