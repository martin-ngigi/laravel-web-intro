<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\View;

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


    function listMemberFunction(){
        //get all data from db using Member model
        $data = Member::all();
        return view('dataCRUD/listMember', ['members'=>$data]);
    }

    /**
     * Summary of listSMS
     * @param Request $request
     * @return \Illuminate\Contracts\View\View
     * listSMS is a function that returns a list of the members sms
     */
    public function listSMS(Request $request){
        $theUrl = 'https://account.movepay.co.ke/api/v1/sms_list';
        //data is the response
          $json_response= Http::post($theUrl, [
              //'token'=>$request->token
              'token'=>'9e275e15571d0e3736b9453e25a28d727b5e9a25'
          ]);

          //convert json to array
          $data_response = json_decode($json_response, true);

          //return $data_response;
          return View::make('dataCRUD/listSMS', compact('data_response'));

    }

    //confirmOnlineTransactionMethod
    public function confirmOnlineTransactionMethod(Request $request){
        $theUrl = 'https://account.movepay.co.ke/api/v1/ConfirmOnlineTransaction';
        //data is the response
          $json_response= Http::post($theUrl, [
              //'token'=>$request->token
              'token'=>'9e275e15571d0e3736b9453e25a28d727b5e9a25',
              'MerchantRequestID'=> 'RAG4HX28Q8'
          ]);
          //convert json to array
          $data_response = json_decode($json_response, true);

          return $data_response;
          //return View::make('dataCRUD/confirmOnlineTransaction', compact('data_response'));

    }

    function deleteMemberFunction($id){
        //NOT WORKING
        //$data = Member::find($id); //id is passed from the view, then to router url, then here
        //$data->delete();

        //WORKING
        Member::where('ID', $id)->delete();

        return redirect('/member-list');
        //return $id;

    }

    function showUpdateDataFunction($id){
        //return Member::find($id);
        $data = Member::find($id);
        return view('dataCRUD/updateMember', ['data' => $data]);
    }

    function postUpdateDataFunction(Request $req){
        //return $req->input();

        $data = Member::find($req->ID); //req.id
        $data->Name = $req->nameInput;
        $data->Email = $req->emailInput;
        $data->Address = $req->addressInput;
        $data->save();

        return redirect('/member-list');
    }

    function queryCRUDOperationsF(){

        //http://127.0.0.1:8000/qb-list

        //RETURN VIEW WITH DATA
        // $data= DB::table('members')->get();
        // return view('queryBuilderCRUD/listMember', ['data'=>$data]);

        //GET ALL DATA
        // return DB::table('members')->get();

        //WHERE CONDITION
        // return DB::table('members')
        // ->where('ID', 5)
        // ->get();

        //FIND FUNCTION
        // return (array)DB::table('members')->find(5);

        //COUNT
        // return (array)DB::table('members')->count();

        //INSERT
        // return DB::table('members')
        //     ->insert(
        //         [
        //             "Name" => "MARTIN",
        //             "Email" => "MARTIN@GMAIL.COM",
        //             "Address" => "NAIROBI",
        //         ]
        //     );

        //UPDATE
        // return DB::table('members')
        //     -> where('ID', 5)
        //     -> update(
        //         [
        //             "Name" => "Martin 1",
        //             "Email" => "martin@GMAIL.COM",
        //             "Address" => "NAIROBI",
        //         ]
        //     );

        //DELETE
        return DB::table('members')
            ->where('ID', 6)
            ->delete();

    }

    function quryAggregate(){
        //get all data
        // return DB::table('members')->get();

        //get average of ids
        // return DB::table('members')->avg('ID');

        //get sum of ids
        // return DB::table('members')->sum('ID');

        //get count of ids
        // return DB::table('members')->count('ID');

        //get max of id
        // return DB::table('members')->max('ID');

        //get min of id
        return DB::table('members')->min('ID');
    }

    function joinFunction(){
        //users is table we want to apply the join to

        //get all data from both tables
        // return DB::table('members')
        // ->join('users',    'members.id','=','users.id')
        // ->get();

        //get data from only members tables ie ->select('members.*')
        // return DB::table('members')
        // ->join('users',    'members.id','=','users.id')
        // ->select('members.*') //when we comment this line, it will display all data from both tables, else[not commented] will only display data from members
        // ->get();

        //get data from users table ie ->select('users.*')
        // return DB::table('members')
        // ->join('users',    'members.id','=','users.id')
        // ->select('users.*') //when we comment this line, it will display all data from both tables, else[not commented] will only display data from members
        // ->get();

        //where query
        return DB::table('members')
        ->join('users',    'members.id','=','users.id')
        ->where('members.id',1) // ie select * from members where id=1
        ->get();

    }
}
