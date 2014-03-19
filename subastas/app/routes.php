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

Route::get('/', 'HomeController@get_index');
Route::get('inicio', 'HomeController@get_index');
Route::get('subasta/{auction_id}', 'HomeController@get_subasta');

Route::get('comprar-puntos', function()
{
    return View::make('comprar-puntos');
});


Route::post('registrar','HomeController@post_register');
Route::post('signin','HomeController@post_signin');
Route::get('time/{auction_id}', 'HomeController@get_time');
Route::get('add_time/{auction_id}', 'HomeController@get_add_time');
Route::get('finish_auction/{auction_id}', 'HomeController@get_finish_auction');

Route::get('logout', function()
{
    Auth::logout();
    return Redirect::to('inicio');
});

Route::post('admin/rnew_item',array('before' => 'auth', 'uses' => 'AdminController@post_new_item'));
Route::get('admin/new_item',array('before' => 'auth', 'uses' => 'AdminController@get_new_item'));

Route::post('admin/rnew_auction',array('before' => 'auth', 'uses' => 'AdminController@post_new_auction'));
Route::get('admin/new_auction',array('before' => 'auth', 'uses' => 'AdminController@get_new_auction'));





























Route::get('articulo', function()
{
    return View::make('articulo');
    //echo date('Y-m-d H:i:s');
});
Route::get('chat', function()
{
    return View::make('chat');
});