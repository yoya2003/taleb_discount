<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $table = 'vendor';
    protected $primaryKey = 'v_id';

    protected $fillable = [
        'b_name',
        'email',
        'pass',
        'website',
        'logo',
        'description',
        'points',
        'address',
        'address_2',
        'phone',
        'facebook',
        'rate',
        'photo1',
        'photo2',
        'photo3',
        'photo4',
        'photo5',
        'category_id'
    ];
    public $timestamps = false;


 //relationship
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'c_id');
    }
}