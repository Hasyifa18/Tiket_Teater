<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    protected $fillable=[
        'customer_name',
        'email',
        'phone',
        'number_ticket',
        'seat_id', 
        'payment_method',
    ];
    
    public function teater()
    {
        return $this->belongsTo(Teater::class);
    }

    public function seat()
    {
        return $this->belongsTo(Seat::class);
    }
    
}
