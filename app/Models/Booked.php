<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booked extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','paddress','email','phone','user_id','car_id','LicesencePhoto','citizenship','citizenshipb'];
protected $table='bookings';
public function car()
{
    return $this->belongsTo(Car::class, 'car_id','id');
}
public function bike()
{
    return $this->belongsTo(Bike::class, 'bike_id','id');
}
}