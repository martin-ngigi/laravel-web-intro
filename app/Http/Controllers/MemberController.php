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

    function addMember(Request $req){
        //create instance of member
        $member = new Member;
        //get data from saveData/addMember.blade.php and insert it to db
        /**
         * $member->name ... name is from database column
         * nameInput is the input field defined in saveData/addMember.blade.php
        */
        $member->name = $req->nameInput;
        $member->email = $req->emailInput;
        $member->address = $req->addressInput;
        $member->save();

        return redirect('/add-member');
    }
}