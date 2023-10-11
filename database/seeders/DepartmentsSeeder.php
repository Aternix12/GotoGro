<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            'Deli',
            'Grocery',
            'Dairy',
            'Produce',
            'Bakery',
            'Frozen',
            'Liquor',
            'Tobacco',
        ];

        foreach ($departments as $departmentName) {
            DB::table('departments')->insert([
                'DepartmentName' => $departmentName
            ]);
        }
    }
}
