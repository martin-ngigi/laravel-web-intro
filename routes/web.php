<?php

use Illuminate\Support\Facades\Route;

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


/**
 * eg http://127.0.0.1:8000/
 */
Route::get('/', function () {
    return view('welcome'); // welcome is the name of the view
});

//eg http://127.0.0.1:8000/about
Route::get("/about", function () {
    return view('about'); //about is the name of the view eg about.blade.php
});

/**
 * above route can be replace with simplified below
 * about2 is the url, about is the page name
 * eg http://127.0.0.1:8000/about2
 * "about2" is missing the '/' eg "/about2" which is optional and still works fine... but for simpicity use '/'
 */
Route::view("about2", 'about');

/**
 * "/contact" is the url
 * 'contact' is the view eg contact.blade.php
 * eg http://127.0.0.1:8000/contact
 */
Route::view("/contact", 'contact');


/**
 * Passing an array of data from the view to the route url
 * eg http://127.0.0.1:8000/pass-data/Martin/
 * Martin is the name
 * check the pass-data.blade.php
 */
Route::get('/pass-data/{name}', function ($name) {
    return view('about', ['name' => $name] );
});

/**
 * Redirect page i.e if a page is clicked, redirect to certain page
 * eg http://127.0.0.1:8000/redirect
 */
Route::get("/redirect", function () {
    return redirect("/about");
});
