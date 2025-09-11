<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Payment extends Model
{
    use HasFactory; 
    
    protected $fillable = [
    'total_amount',
    'payment_date',
    'cvv',
    'card_holdername',
    'card_number',
    'payment_status',
    'payment_method',
    'order_id',
];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
