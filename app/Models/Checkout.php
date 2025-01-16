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
    protected $guarded = ['id'];

    /**
     * Relasi dengan model CheckoutItem (1 ke banyak).
     */
    public function items()
    {
        return $this->hasMany(CheckoutItem::class);
    }
}
