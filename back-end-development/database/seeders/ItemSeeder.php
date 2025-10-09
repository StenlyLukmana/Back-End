<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::create([
            'name' => 'Spatula',
            'price' => '10000',
            'quantity' => '100',
            'category_id' => '1',
            'image' => 'image',
        ]);
        Item::create([
            'name' => 'Sendok',
            'price' => '20000',
            'quantity' => '100',
            'category_id' => '2',
            'image' => 'image',
        ]);
        Item::create([
            'name' => 'Garpu',
            'price' => '30000',
            'quantity' => '100',
            'category_id' => '3',
            'image' => 'image',
        ]);
        Item::create([
            'name' => 'Tangga',
            'price' => '40000',
            'quantity' => '100',
            'category_id' => '4',
            'image' => 'image',
        ]);
    }
}
