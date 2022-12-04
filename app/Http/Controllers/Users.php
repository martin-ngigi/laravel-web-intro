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

    /**
     * Summary of myBlade
     * @return myBlade.blade.php in the views
     */
    function myM(){
        return view('myBlade', ['users'=>['Martin', 'Ken', 'Simon']]);
    }


    /**
     * Summary of ifBlade
     * @return ifM.blade.php in the views
     */
    function ifM(){
        return view('ifBlade', ['user'=>'Ke n']);
    }


    /**
     * Summary of myBlade
     * @return forM.blade.php in the views
     */
    function forM(){
        return view('forBlade', ['user'=>'Ken']);
    }

    //forEachBlade
        /**
     * Summary of myBlade
     * @return forEachBlade.blade.php in the views
     */
    function forEachM(){
        $data = ['Martin', 'Ken', 'David', 'Peris'];
        return view('forEachBlade', ['users'=>$data]);
    }

    /**
     * Summary of getMyData
     * @return string
     */
    function getMyData(Request $myRequest){
        // return "Form Data will be here ";
        return $myRequest->input();
    }
}
