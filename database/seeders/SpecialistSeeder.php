<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Колдунова Татьяна',
            ],
            [
                'name' => 'Орлова Юлия',
            ],
            [
                'name' => 'Мария Ойя и Мария Меньшенина',
            ],
            [
                'name' => 'Мария Ульянова',
            ],
            [
                'name' => 'Анна Середина',
            ],
        ];

        DB::table('specialists')->insert($data);
    }
}
