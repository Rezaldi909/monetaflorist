<?php

namespace Database\Seeders;

use App\Models\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create([
            'nama' => 'New',
            'slug' => 'new',
        ]);
        
        ProductType::create([
            'nama' => 'Standing Flower',
            'slug' => 'standing-flower',
        ]);
        
        ProductType::create([
            'nama' => 'Flower Board',
            'slug' => 'flower-board',
        ]);

        ProductType::create([
            'nama' => 'Gift & Hampers',
            'slug' => 'gift-hampers',
        ]);

        ProductType::create([
            'nama' => 'Artifical Flower',
            'slug' => 'artifical-flower',
        ]);
    }
}
