<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = "Customer";

    protected $fillable = [
        'name',
        'age'
    ];

    public function sale()
    {
      return $this->hasMany(Sale::class, 'customer_id');
    }
}
