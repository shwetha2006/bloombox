<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;  // <- updated

class Event extends Model
{
    protected $connection = 'mongodb';   // ensure it uses mongodb connection
    protected $collection = 'events';    // collection name

    protected $primaryKey = '_id'; // Important for MongoDB
    public $incrementing = false;  // MongoDB _id is not auto-increment
    protected $keyType = 'string';  // _id is a string

    protected $fillable = [
        'event_type',
        'venue',
        'event_name',
        'date',
        'description',
        'images'
    ];

    protected $casts = [
        'date' => 'datetime',
        'images' => 'array',
    ];



}
