<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfirmationLetter extends Model
{
    use HasFactory;

    protected $fillable = [
        'confirmation_number',
        'check_in_date',
        'check_out_date',
        'villa_id',
        'adult',
        'child',
        'total_charge',
        'payment_status',
        'campaign_name',
        'campaign_benefit',
        'remarks',
        'title',
        'full_name',
        'email',
        'phone',
        'check_in_out',
        'terms_conditions',
        'status',
    ];
}
