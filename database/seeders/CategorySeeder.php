<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name'=>'Web Programming',
            'slug'=>'web-programming',
            'color'=>'blue'
        ]);
        Category::factory()->create([
            'name'=>'Ui Ux Designer',
            'slug'=>'ui-ux-designer',
            'color'=>'red'
        ]);
        Category::factory()->create([
            'name'=>'Big Data',
            'slug'=>'big-data',
            'color'=>'yellow'
        ]);
        Category::factory()->create([
            'name'=>'Basis Data',
            'slug'=>'basis-data',
            'color'=>'green'
        ]);
        Category::factory()->create([
            'name'=>'Algoritma',
            'slug'=>'algoritma',
            'color'=>'purple'
        ]);

    }
}
