<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

//use Illuminate\Support\Facades\Blade;

class Products extends Controller
{
    //
    function productsList(){
        $toalProduct = 20;
        return Blade::render('<h1>{{$total}} Product List </h1>', ['total'=>$toalProduct]);
        //return "Product List";
    }

    function addProduct(){
        return "Product is added";
    }

    function updateProduct(){
        return "Product updated.";
    }
}
