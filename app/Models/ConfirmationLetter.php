<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ConfirmationLetter extends Model
{
    use HasFactory;

    public function villa(): BelongsTo
    {
        return $this->belongsTo(Villa::class);
    }

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
