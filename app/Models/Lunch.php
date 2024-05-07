<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lunch extends Model
{
    use HasFactory;

    protected $table = "lunch";

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_family',
        'soup',
    ];


    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'price' => 'double',
        'is_family' => 'boolean',
        'soup' => 'boolean'
    ];

}
