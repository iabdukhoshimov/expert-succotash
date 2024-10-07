<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'session_token',
        'device_info',
        'ip_address',
        'last_activity'
    ];

    /**
     * Each session belongs to a customer.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
