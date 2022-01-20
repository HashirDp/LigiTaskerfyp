<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    use HasFactory;
    protected $table = "booking_details";
    protected $fillable = [
        'service_name',
        'service_qty',
        'price',

        'dicount',
        'g_total',
        'provider_id',
        'provider_name',
        'user_name',
        'house_no',
        'block',
        'area',
        'city',
        'order_id',

    ];
}
