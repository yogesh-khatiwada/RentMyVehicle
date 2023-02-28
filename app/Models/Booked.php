<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','email','contact','user_id','car_id','resume'];

public function car()
{
    return $this->belongsTo(Car::class, 'car_id','id');
}
}