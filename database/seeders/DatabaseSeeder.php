<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;

use Database\Seeders\FlowerTypeSeeder;
use Database\Seeders\ProductTypeSeeder;
use Database\Seeders\EventTypeSeeder;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FlowerTypeSeeder::class);
        $this->call(ProductTypeSeeder::class);
        $this->call(EventTypeSeeder::class);
        // User::factory(10)->create();

        Product::factory(25)->create();

        User::create([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345'),
        ]);

            

            

        
        
        // Product::create([
        //     'event_id' => '1',
        //     'users_id' => '1',
        //     'nama' => 'Lily',
        //     'slug' => 'lily',
        //     'harga' => '200.000',
        //     'foto' => 'lily.jpg',
        // ]);
        
        // Product::create([
        //     'event_id' => '2',
        //     'users_id' => '1',
        //     'nama' => 'Rose',
        //     'slug' => 'rose',
        //     'harga' => '200.000',
        //     'foto' => 'rose.jpg',
        // ]);

        // Product::create([
        //     'event_id' => '3',
        //     'users_id' => '1',
        //     'nama' => 'Red velvet',
        //     'slug' => 'red-velvet',
        //     'harga' => '400.000',
        //     'foto' => 'red-velvet.jpg',
        // ]);
        
    }
}
