<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Villa extends Model
{
    use HasFactory;

    public function confirmation_letters(): HasMany
    {
        return $this->hasMany(ConfirmationLetter::class);
    }

    protected $fillable = [
        'name',
        'image',
        'description',
        'size',
        'advantages',
        'view',
    ];
}
