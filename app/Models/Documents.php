<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documents extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'car_id',
        'document_type',
        'front_side',
        'reverse_side',
        'full_photo',
        'back_side',
        'selfie_with_license',
        'license',
        'status',
        'rejection_reason',
        'approved_at',
        'rejected_at',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function car()
    {
        return $this->belongsTo(Cars::class);
    }
}
