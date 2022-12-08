<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    //
    /**
     * Summary of show
     * @return 'pagination/list' is the view is list.blade.php
     * "members" is the tables name
     *
     * */
    function showMember(){

        //$data = Member::all(); //show all members
        $data = Member::paginate(1); // show only 1 rows per page
        return view('pagination/list', ['members'=> $data]);
    }
}
