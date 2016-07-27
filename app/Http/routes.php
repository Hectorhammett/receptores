<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('recepcion');
});

Route::get('/recepcion',function(){
    return view("recepcion");
});

Route::get('/residuos','ResiduesController@index');
Route::get( '/store-residue', 'ResiduesController@storeResidueData' );
Route::get('/get-all-residues', 'ResiduesController@getAllResidueData' );
Route::get('/store-manifest', 'ManifestController@storeManifestData' );