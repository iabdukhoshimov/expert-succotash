<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'balance',
        'gender',
        'pinfl',
        'birth_date',
        'phone_number',
        'email',
        'customer_type',
        'device_count',
        'avatar_url',
    ];

    public function documents()
    {
        return $this->hasMany(Documents::class);
    }
}
