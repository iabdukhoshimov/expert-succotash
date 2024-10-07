<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'car_brand_id', 'tariff_slug', 'car_category_id'];

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class);
    }
}
