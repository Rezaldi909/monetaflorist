<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutItem extends Model
{
    use HasFactory;

    // Tentukan tabel jika nama tidak sesuai konvensi
    protected $table = 'checkout_items';

    // Kolom yang dapat diisi secara massal
    protected $guarded = ['id'];

    /**
     * Relasi dengan model Checkout (many ke 1).
     */
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
