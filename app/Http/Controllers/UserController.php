<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

/**
 * Summary of UserController
 * Fetches the data from the db using a Model called users
 */
class UserController extends Controller
{
    //
    function getDataFromDB(){
        return User::all();
    }
}
