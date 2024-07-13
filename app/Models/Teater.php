<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teater extends Model
{
    use HasFactory;

    protected $table = 'teater';

    protected $fillable = [
        'title',
        'description',
        'show_date'
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class);
    }
}
