<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'c_id';

    protected $fillable = ['name'];

    //relationship
    public function vendors()
    {
        return $this->hasMany(Vendor::class, 'category_id', 'c_id');
    }
}