<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent extends Model
{
    use HasFactory;
    protected $fillable = ['name','address','paddress','email','contact','user_id','car_id','resume','citizenship','citizenshipb'];

public function car()
{
    return $this->belongsTo(Car::class, 'car_id','id');
}
}