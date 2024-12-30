<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Reservation extends Model
{
    use HasFactory,  Notifiable, HasApiTokens;
    protected $table = 'reservations';

    // Define the fillable attributes
    protected $fillable = [
        'rental_id',
        'user_id',
        'status',
    ];

    // Define the relationships
    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
