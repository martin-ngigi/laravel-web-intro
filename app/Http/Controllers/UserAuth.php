<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuth extends Controller
{
    //
    /**
     * Summary of getLoginSession
     * @param Request $req
     * @return mixed
     */
    function getLoginSession(Request $req){

        /**
         * @var mixed $data is the users data inclussive of username and password
         * Store the users' username in session through a key called user
         */
        $data =  $req->input();
        $req->session()->put('user', $data['username']);
        echo session('user');

        return redirect("/profile");
    }
}
