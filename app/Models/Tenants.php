<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenants extends Model
{
    use HasFactory;

    protected $table = 'tenants';

    //public $timestamps = false;

    public $fillable = [
        'name',
        'mobile',
        'base_rent'
    ];
}
