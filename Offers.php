<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offers extends Model
{
    use HasFactory;

    protected $table = 'offers'; // جدولك اسمه offer مش offers
    protected $primaryKey = 'o_id';

    protected $fillable = [
        'img',
        'p_name',
        'units',
        'percentage',
        'status',
        'due_date',
        'price',
        'price_after',
        'description',
        'address',
        'v_id'

        
    ];
    public function vendor()
{
    return $this->belongsTo(Vendor::class, 'v_id'); // مهم جداً تكتبي 'v_id' هنا
}


    public $timestamps = false; // لو جدولك مفيهوش created_at و updated_at
}
