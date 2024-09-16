<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EventType::create([
            'nama' => 'Christmast Edition',
            'slug' => 'christmast-edition',
        ]);
        
        EventType::create([
            'nama' => 'Chinese New year',
            'slug' => 'chinese-new-year',
        ]);
        
        EventType::create([
            'nama' => 'New Born Baby',
            'slug' => 'new-born-baby',
        ]);
    }
}
