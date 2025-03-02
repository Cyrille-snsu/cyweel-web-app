<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'hotel',
        'room_type',
        'guest_name',
        'phone',
        'address',
        'check_in_date',
        'check_out_date',
        'days_of_stay',
        'payment_method',
        'total_price',
        'special_requests',
        'status'
    ];

    protected $casts = [
        'check_in_date' => 'datetime',
        'check_out_date' => 'datetime',
        'total_price' => 'decimal:2'
    ];

    public function setHotelAttribute($value)
    {
        $this->attributes['hotel'] = is_array($value) || is_object($value) ? $value['name'] : $value;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
