<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Shipment extends Model
{

    use HasFactory;

protected $fillable = [
    'shipment_date',
    'shipment_cost',
    'order_id',
    'address_line1',
    'address_line2',
    'city',
    'postal_code',
    'shipment_status',
];


     public function order()
    {
        return $this->belongsTo(Order::class);
    }
}

