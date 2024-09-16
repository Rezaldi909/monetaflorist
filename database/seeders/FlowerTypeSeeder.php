<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FlowerType;

class FlowerTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FlowerType::create([
            'nama' => 'Fresh Flower',
            'slug' => 'christmast-edition',
        ]);
        
        FlowerType::create([
            'nama' => 'Boquet',
            'slug' => 'boquet',
        ]);
        
        FlowerType::create([
            'nama' => 'Rustic Boquet',
            'slug' => 'rustic-boquet',
        ]);

        FlowerType::create([
            'nama' => 'Vase',
            'slug' => 'vase',
        ]);

        FlowerType::create([
            'nama' => 'Blossom Box',
            'slug' => 'blossom-box',
        ]);

        FlowerType::create([
            'nama' => 'Acrylic Blossom Box',
            'slug' => 'acrylic-blossom-box',
        ]);
    }
}
