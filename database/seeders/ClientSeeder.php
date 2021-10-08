<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Client::factory(100)->create();

        $data = [
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'patronymic' => 'Отчество',
            'phone' => '89778732812',
            'email' => 'um_2005@mail.ru',
            'experience' => 'нет опыта'
        ];

        DB::table('clients')->insert($data);
    }
}
