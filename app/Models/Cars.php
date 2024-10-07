<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'car_model_id',
        'fuel_id',
        'car_colour_id',
        'car_number',
        'manufacture_year',
        'main_car',
        'can_deliver',
        'status',
        'technical_passport_front',
        'technical_passport_back',
        'car_photo_left',
        'car_photo_right',
        'car_photo_front',
        'car_photo_back',
        'car_photo_trunk',
        'car_photo_seats_back',
        'car_photo_seats_front',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function carModel()
    {
        return $this->belongsTo(CarModel::class);
    }

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function carColour()
    {
        return $this->belongsTo(CarColour::class);
    }
}
