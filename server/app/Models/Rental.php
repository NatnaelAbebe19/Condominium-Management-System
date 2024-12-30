<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Rental extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $fillable = [
        'bedrooms',
        'floor',
        'location',
        'area', // Add area to fillable
        // 'images',
        'price', // Add price to the fillable array
        'status',
        'renter_id',
        'customer_id',
    ];

    protected $casts = [
        'images' => 'array',
    ];

     // Relationship with renter
     public function renter()
     {
         return $this->belongsTo(User::class, 'renter_id');
     }

     // Relationship with customer
     public function customer()
     {
         return $this->belongsTo(User::class, 'customer_id');
     }

     public function images()
     {
         return $this->hasMany(RentalImage::class);
     }
     public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

}
