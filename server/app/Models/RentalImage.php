<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class RentalImage extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'rental_images';
    protected $fillable = [
        'rental_id',
        'image'
    ];



    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
