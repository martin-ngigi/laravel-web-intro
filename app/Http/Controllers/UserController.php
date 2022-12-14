<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{

    /**
     * Summary of UserController
     * Fetches the data from the db using a Model called users
     */
    //
    function getDataFromDB(){
        return User::all();
    }

    function apiData(){
        /**
         *
        {
        "page":1,
        "per_page":6,
        "total":12,
        "total_pages":2,
        "data":[
            {
                "id":1,
                "email":"george.bluth@reqres.in",
                "first_name":"George",
                "last_name":"Bluth",
                "avatar":"https://reqres.in/img/faces/1-image.jpg"
            },
            {
                "id":2,
                "email":"janet.weaver@reqres.in",
                "first_name":"Janet",
                "last_name":"Weaver",
                "avatar":"https://reqres.in/img/faces/2-image.jpg"
            },
            {
                "id":3,
                "email":"emma.wong@reqres.in",
                "first_name":"Emma",
                "last_name":"Wong",
                "avatar":"https://reqres.in/img/faces/3-image.jpg"
            },
            {
                "id":4,
                "email":"eve.holt@reqres.in",
                "first_name":"Eve",
                "last_name":"Holt",
                "avatar":"https://reqres.in/img/faces/4-image.jpg"
            },
            {
                "id":5,
                "email":"charles.morris@reqres.in",
                "first_name":"Charles",
                "last_name":"Morris",
                "avatar":"https://reqres.in/img/faces/5-image.jpg"
            },
            {
                "id":6,
                "email":"tracey.ramos@reqres.in",
                "first_name":"Tracey",
                "last_name":"Ramos",
                "avatar":"https://reqres.in/img/faces/6-image.jpg"
            }
        ],
        "support":{
            "url":"https://reqres.in/#support-heading",
            "text":"To keep ReqRes free, contributions towards server costs are appreciated!"
        }
        }
         */


        /**
         * @var mixed $collection
         * 'httpClientAPI/users' is the view dirctory
         */
        $collection = Http::get("https://reqres.in/api/users");
        return view('httpClientAPI/users', ['collection'=> $collection['data']]);
    }
    /**
     * Summary of testRequest
     * @param Request $req
     * @return mixed
     * for testing http requests
     */
    function testRequest(Request $req){
        return $req -> input();
    }
}
