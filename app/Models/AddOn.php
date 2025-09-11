<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddOn extends Model
{
    use HasFactory; 
    
    protected $fillable=
    [
        'name',
        'price',
        'description',
        'image',
        'stock_quantity',
    ];

  
    public function bouquets()
    {
        return $this->belongsToMany(Bouquet::class, 'bouquet_add_on');
    }
}
