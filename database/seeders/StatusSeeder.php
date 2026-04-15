<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $statuses = [
        ['name' => 'Новое'],
        ['name' => 'В работе'],
        ['name' => 'Завершено'],
        ['name' => 'Отклонено'],
    ];

    DB::table('statuses')->insert($statuses);
    }
}
