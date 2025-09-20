<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Bouquet extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'admin_id',
        'stock_quantity',
        'category_id',
    ];


   public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}


    public function addOns()
    {
        return $this->belongsToMany(AddOn::class, 'bouquet_add_on');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}

}
