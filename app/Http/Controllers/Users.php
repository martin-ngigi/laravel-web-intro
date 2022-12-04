<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{
    /**
     * Summary of index
     * @return void
     */
    public function index(){
        echo "Hello from controller";
    }

    /**
     * Summary of getMyName
     * @param mixed $name is the name to be passed in the method
     * @return void
     */
    public function getMyName($name){
        echo $name;
    }

    /**
     * Summary of asAnAPI
     * @return array
     * This method can be used as api as it will return a json array
     */
    public function asAnAPI(){
        return ['name' => "Martin", 'age' => 10];
    }

    /**
     * Summary of loadView
     * @return myView.blade.php which is the view defined in the views
     * Explanation: The view is called by the Controller, Then then controller is called by the route
     */
    public function loadView(){
        return view('myView');
    }

     /**
     * Summary of loadView
     * @return myViewPassData.blade.php which is the view defined in the views
     * Explanation: The view is called by the Controller, Then then controller is called by the route
     */
    public function loadViewPassData($name){
        return view('myViewPassData', ['name'=>$name]);
    }
}
