<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GenderSeeder::class);
        $this->call(MemberStatusSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(DepartmentsSeeder::class);
        $this->call(CategoriesSeeder::class);
    }
}
