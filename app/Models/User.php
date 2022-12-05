<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    /**
     * Incase the table name dont match with model name...
     * One can define the table name here
     * eg the model name is User but the db table name is Employees
     */
    
    //public $table = "employees";

}
