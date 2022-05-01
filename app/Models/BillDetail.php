<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bill(){
        return $this->beLongsTo(Bill::class,'bill_id','id');
    }

        // public function product()
        // {
        //     return $this->belongsTo(Product::class, 'product_id', 'id');
        // }

    
}
