<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['customerName', 'email', 'phone', 'type', 'Name', 'image'];
    public static function getcustomerdatacount()
    {
        return DB::table('customers')->count();
    }
}
