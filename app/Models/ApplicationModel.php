<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ApplicationModel extends Model
{
    use HasFactory;

    protected $table='rent';

    public $timestamps = false;

    protected $fillable = [
        'tenant_id',
        'base_charge',
        'prev_units',
        'new_units',
        'charge',
        'type_of_charge',
        'price_of_other',
        'previous_due',
        'total',
        'bill_date',
        'status'
    ];	

}
