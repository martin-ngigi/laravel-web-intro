<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddMemberController extends Controller
{
    //
    function addMember(Request $req){
        /**
         * store username in a flash session
         */
        $data = $req->input('username');
        $req->session()->flash('username', $data);

        return redirect("/add-member-url");
    }
}
