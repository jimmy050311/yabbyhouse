<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

Route::get('/', function() {
    return view('home');
});
Route::get('/studio', function() {
    return view('studio');
});
Route::get('/showcase', function() {
    return view('showcase');
});
Route::get('/blog', function() {
    return view('blog');
});
Route::get('/blog-detail', function() {
    return view('blog-detail');
});
Route::get('/contact', function() {
    return view('contact');
});



