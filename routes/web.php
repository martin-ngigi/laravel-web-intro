<?php

use App\Http\Controllers\Products;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users;
use App\Http\Controllers\UserAuth;
use App\Http\Controllers\AddMemberController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MemberController;

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
 * if age<18 redirect to no-access page else redirect to home page
 * 'myProtectedPage' is the name defined in the kernel.php
 */
Route::group(['middleware' => ['myProtectedPage']], function(){
    //http://127.0.0.1:8000/middleware-home?age=15
    //http://127.0.0.1:8000/middleware-home?age=19
    Route::get("/middleware-home", function () {
        return view("myMiddleware/home");
    });
});

/**
 * route middleware
 * if age<18 redirect to no-access page else redirect to about page
 *'myProtected' is the name defined in the kernel.php
 * "/middleware-about" is the url
 * "myMiddleware/about" is the view directory
 * eg http://127.0.0.1:8000/middleware-about?age=15
 * eg http://127.0.0.1:8000/middleware-about?age=19
 */
Route::view("/middleware-about", "myMiddleware/about")->middleware('myProtected');


/**
 * Calling a view from the controller
 * "/myusers" is the url
 * "myIndex" is the method defined in the User Controller
 * eg http://127.0.0.1:8000/myusers
 *
 * Explanation: Then then controller is called by the route
 */
Route::get("/myusers",[ Users::class, "myIndex"]);



/**
 * GETTING DATA FROM DB USING A MODEL
 * Calling a view from the controller
 * "/get-users" is the url
 * "getDataFromDB" is the method defined in the UserController
 * eg http://127.0.0.1:8000/get-users
 *
 * Explanation:Then then controller is called by the route
 */
Route::get("/get-users", [UserController::class, 'getDataFromDB']);


/**
 * GETTING DATA FROM API
 * Calling a view from the controller
 * "/get-api-data" is the url
 * "apiData" is the method defined in the UserController
 * eg http://127.0.0.1:8000/get-api-data
 *
 * Explanation:Then then controller is called by the route
 */
Route::get("/get-api-data", [UserController::class, 'apiData']);

/**
 * HTTP REQUEST METHODS
 * Calling a view from the controller
 * "/http-user-requests" is the action to be performed when login button is clicked
 * "/login-requests" is the url
 * "testRequest" is the method defined in the UserController
 * http://127.0.0.1:8000/login-requests
 *
 * Explanation:Then then controller is called by the route
 */
//route::post("/http-user-requests", [UserController::class, "testRequest"]);
//route::delete("/http-user-requests", [UserController::class, "testRequest"]);
route::put("/http-user-requests", [UserController::class, "testRequest"]);
Route::view("/login-requests", "httpRequestAPIs/users");

/**
 *
 * SAVING DATA IN SESSIONS
 * "/login-session-requests" is the action to be performed when login button is clicked
 * "getLoginSession" is the method in UserAuth Controller that is called
 * "/my-login" is the url
 * "/profile" is the url
 * 'sessions/login' is the view
 * 'sessions/profile' is the view
 */
//http://127.0.0.1:8000/my-login
Route::post("/login-session-requests", [UserAuth::class, "getLoginSession"]);
//Route::view("/my-login", 'sessions/login');
Route::view("/profile", 'sessions/profile');
Route::get("/my-login", function () {
    if(session() -> has('user')){
        session() -> pull('user');
        return view('sessions/profile');
    }
    else{
        return view('sessions/login');
    }
});
Route::get("/logout", function () {
    if(session() -> has('user')){
        session() -> pull('user');
    }
    return redirect('/my-login');
});

/**
 * FLASH SESSIONS
 * Calling a view from the controller
 * "/add-member" is the action to be performed when login button is clicked
 * "/add-member-url" is the url
 * 'flashSession/addUser' is view directory
 * "testRequest" is the method defined in the UserController
 * http://127.0.0.1:8000/login-requests
 *
 * Explanation:Then then controller is called by the route
 */
//http://127.0.0.1:8000/add-member-url
//'flashSession/addUser'
Route::view('/add-member-url', 'flashSession/addUser');
Route::post('/add-member', [AddMemberController::class, 'addMember']);


/**
 * UPLOADING FILES IE. A PICTURE
 * Calling a view from the controller
 * "/upload" is the urlthat has the form for uploading the file
 * "uploadFiles/upload" is directory containing upload view
 * "/my-upload" is the url action that will be performed when button is clicked
 * "uploadMyFile" is the method defined in the UploadController
 * eg http://127.0.0.1:8000/get-users
 *
 * Explanation:Then then controller is called by the route
 */
//http://127.0.0.1:8000/upload
Route::view("/upload", "uploadFiles/upload");
Route::post("/my-upload", [UploadController::class, "uploadMyFile"]);


//http://127.0.0.1:8000/localization
Route::view("/localization", "localization/profle");


/**
 * PAGINATION
 * Calling a view from the controller
 * "/get-members" is the url
 * "showMember" is the method defined in the UploadController
 *
 * Explanation:Then then controller is called by the route
 */
//http://127.0.0.1:8000/get-members
Route::get('/get-members', [MemberController::class, 'showMember']);

/**
 * SAVE DATA TO DATABASE
 * Calling a view from the controller
 * "/add-member" is the url that has the form for uploading the data
 * "dataCRUD/addMember" is directory containing upload view
 * "/add-mymember" is the url action that will be performed when button is clicked
 * "addMember" is the method defined in the UploadController
 *
 * Explanation:Then then controller is called by the route
 */
//http://127.0.0.1:8000/add-member
Route::view("/add-member", "dataCRUD/addMember");
Route::post("/add-mymember", [MemberController::class, 'addMember']);

/**
 * DELETE DATA FROM DATABASE
 * Calling a view from the controller
 * "/member-list" is the url that will get data data and display it in a list the data
 * "listMembersFunction" is Controller function for getting data
 * "dataCRUD/addMember" is directory containing upload view
 * "/member-delete/{ID}" is the url action that will be performed when button is clicked
 * "deleteMemberFunction" is the method defined in the MemberController for deleting
 * "member-update/{ID}/" for udating user
 * "/member-update-post"" is the action defined in updateMember.blade.php
 * "postUpdateDataFunction" is the method defined in the Member Contoller
 * Explanation:Then then controller is called by the route
 */
//http://127.0.0.1:8000/sms-member
//get all list
Route::get("/sms-member", [MemberController::class, 'listMemberFunction']);

//handle delete
Route::get("/member-delete/{ID}", [MemberController::class, 'deleteMemberFunction']);
Route::get("/member-update/{ID}", [MemberController::class, 'showUpdateDataFunction']);
Route::post("/member-update-post", [MemberController::class, 'postUpdateDataFunction']);

/**
 * QUERY CRUD OPERATIONS
 */
//http://127.0.0.1:8000/qb-list
Route::get('qb-list', [MemberController::class, 'queryCRUDOperationsF']);

/**
 * AGGREGATES EG, sum, max, avg, min
 */
//http://127.0.0.1:8000/aggregates
Route::get("aggregates", [MemberController::class, 'quryAggregate']);

/**
 * JOINS
 */
//http://127.0.0.1:8000/my-joins
Route::get('/my-joins', [MemberController::class, 'joinFunction']);


//createSMS
//http://127.0.0.1:8000/my-sms-list
Route::post("/my-sms-list", [MemberController::class, 'listSMS']);
Route::get("/my-sms-list", [MemberController::class, 'listSMS']);// sender number, message code, sender number, amount, details
