<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniStudent extends Model
{
   protected $table = 'uni_student';
    protected $primaryKey = 'u_id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'pass', 'NI', 'email', 'uni_email', 'phone', 'level', 'uni_name' , 'age' , 'faculty' , 'address' ,'points' , 'total_saving'
    ];
}
