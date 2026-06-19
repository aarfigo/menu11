<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price_usd',
        'price_bs',
        'category_id', // Clave foránea numérica real
        'category',    // 🛠️ Se agrega temporalmente para evitar el error 1364 de MySQL
        'tag',
        'badge',
        'image_url',
        'is_active',
    ];

    protected $appends = [
        'price',
    ];

    protected $casts = [
        'price_usd' => 'float',
        'price_bs' => 'float',
        'is_active' => 'boolean',
    ];

    public function getPriceAttribute()
    {
        return $this->price_usd;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity', 'note', 'subtotal')
            ->withTimestamps();
    }
}