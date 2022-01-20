<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceBooking extends Model
{
    use HasFactory;
    protected $table = "service_bookings";
    protected $fillable = [
        'order_no',
        'order_status',
        'amount_payble',
        'amount_receivced',
        'job_assign_to',
        'job_assigned_at',
        'job_started_at',
        'job_completed_at',
        'service_id',
        'user_id'
    ];

}
