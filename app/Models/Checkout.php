<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tidak sesuai konvensi
    protected $table = 'checkouts';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'address',
        'city',
        'postal_code',
        'phone',
        // 'payment_method',
        'order_notes',
        'same_as_shipping',
    ];

    /**
     * Relasi dengan model CheckoutItem (1 ke banyak).
     */
    public function items()
    {
        return $this->hasMany(CheckoutItem::class);
    }
}
