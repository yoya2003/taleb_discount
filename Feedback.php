<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'f_id'; 
    public $timestamps = false; 

protected $fillable = [
    'email', 'type', 'rate', 'suggestion', 'student_id', 'uni_id'
];


public function student()
    {
        return $this->belongsTo(Schoolstudent::class, 'student_id');
    }

    public function university()
    {
        return $this->belongsTo(UniStudent::class, 'uni_id');
    }

}



