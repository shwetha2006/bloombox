<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderItem extends Model
{
    use HasFactory; 
    
    protected $fillable = [
        'order_id',
        'bouquet_id',
        'add_on_id',
        'parent_order_item_id',
        'quantity',
        'price',
    ];

public function order() 
{ 
    return $this->belongsTo(Order::class); 
}

public function bouquet() 
{ 
    return $this->belongsTo(Bouquet::class); 
}


    public function addOn()
    {
        return $this->belongsTo(AddOn::class);
    }

    public function parent()
    {
        return $this->belongsTo(OrderItem::class, 'parent_order_item_id');
    }

    public function children()
    {
        return $this->hasMany(OrderItem::class, 'parent_order_item_id');
    }
}
