<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    protected $fillable = [
        'name',
        'description',
        'beneficiary',
        'account_number',
        'bank_name',
        'phone',
        'icon',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public static function active()
    {
        return self::where('is_active', true)->orderBy('order')->get();
    }
}
