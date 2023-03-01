<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'phone', 'billbookphoto', 'citizenshipfp', 'citizenshipbp'];
    public static function getcustomerdatacount()
    {
        return DB::table('customers')->count();
    }
}
