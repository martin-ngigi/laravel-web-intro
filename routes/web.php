<?php

use App\Http\Controllers\Products;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;

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
    return view('pass-data', ['name' => $name] );
});

/**
 * Redirect page i.e if a page is clicked, redirect to certain page
 * eg http://127.0.0.1:8000/redirect
 */
Route::get("/redirect", function () {
    return redirect("/about");
});

/**
 * get the controller
 * "/users" is the name of the url
 * Users is the Controller
 * 'index' is the method inside the controller.
 * eg http://127.0.0.1:8000/users
 */
Route::get("/users", [Users::class, 'index']);

/**
 * "/names" is the name of the url
 * getMyName is a function which expects name argument
 * eg http://127.0.0.1:8000/names/Martin
 *
 */
Route::get("/names/{name}", [Users::class, 'getMyName']);

/**
 * "/api" is the url
 * 'asAnAPI' is the method defined in the users controller
 * eg http://127.0.0.1:8000/api
 */
Route::get("/api", [Users::class, 'asAnAPI']);

/**
 * Calling a view from the controller
 * "/view" is the url
 * "loadView" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/view
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/view", [Users::class, 'loadView']);


/**
 * Calling a view from the controller
 * "/view" is the url
 * "loadView" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/viewPassData/Martin/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/viewPassData/{name}/", [Users::class, 'loadViewPassData']);


Route::get('/url-gen', function () {
    return view("url-generation");
});


/**
 * "/component" is the name of the url
 * Users is the Controller
 * 'myComponent' is the myComponent.blade.php view.
 * eg http://127.0.0.1:8000/component
 */
Route::get("/component", function () {
    return view("myComponent");
});


/**
 * Calling a view from the controller
 * "/my-blade" is the url
 * "myM" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/my-blade/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/my-blade", [Users::class, 'myM']);


/**
 * Calling a view from the controller
 * "/if-blade" is the url
 * "ifM" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/if-blade/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/if-blade", [Users::class, 'ifM']);

/**
 * Calling a view from the controller
 * "/for-blade" is the url
 * "forM" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/for-blade/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/for-blade", [Users::class, 'forM']);


/**
 * Calling a view from the controller
 * "/for-blade" is the url
 * "forEachM" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/forEach-blade/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/forEach-blade", [Users::class, 'forEachM']);

/**
 * "/including-views" is the url
 * "myIncludes/outer" is the view dirctory
 * eg http://127.0.0.1:8000/including-views/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/including-views", function () {
    return view("myIncludes/outer");
});

/**
 * "/inline-blade" is the url
 * "myIncludes/outer" is the view dirctory
 * eg http://127.0.0.1:8000/inline-blade/
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::get("/inline-blade", [Products::class, 'productsList']);


/**
 * Calling a view from the controller
 * "/get-users" is the url
 * "getData" is the method defined in the User Controller
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
Route::post("/get-users", [Users::class, 'getMyData']);
/**
 * form is the view ie form.blade.php
 * eg http://127.0.0.1:8000/login/
 * Explanation: When the user clicks the btn login,,, he is redirected to "/get-users"......
 * "/get-users" calls the User controller which has getMyData method which returns a users input plus token
 */
Route::view("/login", "forms");


/**
 * "/middleware-users" is the url
 * "myMiddleware/users" is the view dirctory
 * eg http://127.0.0.1:8000/middleware-users/
 * eg http://127.0.0.1:8000/middleware-users?age=19
 *
 * Explanation: The view is called by the Controller, Then then controller is called by the route
 */
//http://127.0.0.1:8000/middleware-users?age=15
//eg http://127.0.0.1:8000/middleware-users?age=19
Route::get("/middleware-users", function () {
    return view("myMiddleware/users");
});
//http://127.0.0.1:8000/middleware-no-access
Route::get("/middleware-no-access", function () {
    return view("myMiddleware/noAccess");
});



/** Grouped middle to only allow access to home page to who are 18 years and above
 * eg check in the kernel.php
 */
Route::group(['middleware' => ['myProtectedPage']], function(){
    //http://127.0.0.1:8000/middleware-home?age=15
    //http://127.0.0.1:8000/middleware-home?age=19
    Route::get("/middleware-home", function () {
        return view("myMiddleware/home");
    });
});
