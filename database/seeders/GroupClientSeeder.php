<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 1;
        while ($i <= 150) {
            $data = [
                [
                    'group_id' => rand(1, 10),
                    'client_id' => rand(1, 100),
                    'created_at' => now()
                ]
            ];

            DB::table('groups_clients')->insert($data);
            $i++;
        }
    }
}
