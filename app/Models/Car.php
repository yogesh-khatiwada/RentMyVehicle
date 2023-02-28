<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = ['carName', 'image', 'model','quantity','prize','date','day','added','status'];
    public static function getdatacount(){
        return DB::table('cars')->count();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'added', 'id');
}

}
