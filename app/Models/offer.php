<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class offer extends Model
{
    use HasFactory;
    protected $fillable = ['vehicleName', 'image', 'model','prize'];
    public static function getofferdatacount(){
        return DB::table('offers')->count();
    }

}
