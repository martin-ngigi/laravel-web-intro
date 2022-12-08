<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Member extends Model
{

    use HasFactory;
    /**
     * Solve error: "SQLSTATE[42S22]: Column not found: 1054 Unknown column 'updated_at' in 'field list'"
     *
     */
    public $timestamps = false;
}
