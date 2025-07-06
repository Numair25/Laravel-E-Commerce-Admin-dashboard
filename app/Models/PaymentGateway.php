<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentGateway extends Model
{
    protected $fillable = [
        'name',
        'api_key',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
