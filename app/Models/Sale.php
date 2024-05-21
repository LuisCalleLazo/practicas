<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = "Sale";

    protected $fillable = [
        'customer_id',
        'lunch_id'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function lunch()
    {
        return $this->belongsTo(Lunch::class);
    }
}
