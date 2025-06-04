<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schoolstudent extends Model
{
    protected $table = 'school_student';
    protected $primaryKey = 's_id';
    public $timestamps = false;

    protected $fillable = [
        'name', 'pass', 'NI', 'email', 'phone', 'level', 'schoolName','age' , 'address','points','total_saving'
    ];
}
