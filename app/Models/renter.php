<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class renter extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'number','age','tadd','padd','c_image','b_image','l_image'];
    public static function getrenterdatacount()
    {
        return DB::table('renters')->count();
    }
}
