<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    //
    function uploadMyFile(Request $req){
        /**
         * 'file' is the defined in upload.blade.php ie <input type="file" name="file"><br><br>
         * 'docs' is the name of the folder
         * After adding, can be viewed in C:\xampp\htdocs\LARAVEL\laravel-web-intro\storage\app\docs
         */
        return $req->file('file')->store('docs');
    }
}
