<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['technology', 'sports', 'fashoin'];

        foreach($data as $item)
        {
            Category::updateOrCreate([
                'name' => $item,
                'slug' => Str::slug($item),
                'status' => true,
            ]);
        }
    }
}
