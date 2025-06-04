<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class verify_document extends Model
{
    protected $table = 'verify_document'; // اسم الجدول في قاعدة البيانات

    protected $primaryKey = 'vd_id'; // المفتاح الأساسي

    public $timestamps = false; // لأن الجدول مفيهوش created_at و updated_at

    protected $fillable = [
        'type',
        'doc',
        'submit_status',
        'submit_date',
        'verify_status',
        'student_id',
        'uni_id',
    ];

    // علاقات افتراضية ممكن تضيفيها لو عندك models للطلاب والجامعات

    public function student()
    {
        return $this->belongsTo(Schoolstudent::class, 'student_id');
    }

    public function university()
    {
        return $this->belongsTo(UniStudent::class, 'uni_id');
    }
}
