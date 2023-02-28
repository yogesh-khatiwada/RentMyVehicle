<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    use HasFactory;
    protected $fillable = ['bikeName', 'image', 'model','quantity','prize','date','day','added','status'];
    public static function getbikedatacount(){
        return DB::table('bikes')->count();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'added', 'id');
}
}
