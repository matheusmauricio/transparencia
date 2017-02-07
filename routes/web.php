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
    return view('index');
});

Route::get('/portal', function () {
    return view('comum.portal');
});

Route::get('/glossario', function () {
    return view('comum.glossario');
});

Route::get('/manual', function () {
    return view('comum.manual');
});

Route::get('/legislacao', function () {
    return view('comum.legislacao');
});

Route::get('/faq', function () {
    return view('comum.faq');
});

Route::get('/mapasite', function () {
    return view('comum.mapasite');
});
