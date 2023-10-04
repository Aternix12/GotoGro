<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $categories = [
            'Health',
            'Beauty',
            'Cookware',
            'Confectionary',
        ];

        foreach ($categories as $categoryName) {
            DB::table('categories')->insert([
                'CategoryName' => $categoryName
            ]);
        }
    }
}
