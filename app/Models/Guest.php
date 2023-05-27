<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'full_name',
        'email',
        'phone',
        'country',
        'birth_date',
        'reservation_date',
    ];
}
