<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('member_statuses')->insert([
            [
                'MemberStatus' => 'Active',
            ],
            [
                'MemberStatus' => 'Inactive',
            ],
            [
                'MemberStatus' => 'Deleted',
            ],
        ]);
    }
}
