<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
class TemporaryImage extends Model
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'temporary_images';
    protected $fillable = [
        'folder',
        'file'
    ];

}
