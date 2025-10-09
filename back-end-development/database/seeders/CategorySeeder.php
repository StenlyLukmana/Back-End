<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Category::create([
            'name'=> "Buku",
        ]);
        Category::create([
            'name'=> "Alat Makan",
        ]);
        Category::create([
            'name'=> "Alat Kebun",
        ]);
        Category::create([
            'name'=> "Alat Tulis",
        ]);
    }
}
