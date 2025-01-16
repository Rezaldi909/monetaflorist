<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory, Sluggable;

    protected $guarded = ['id'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama' // Use the 'nama' field to generate the slug
            ]
        ];
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'event_type_id');
    }

    
}
