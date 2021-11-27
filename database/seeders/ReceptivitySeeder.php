<?php

namespace Database\Seeders;

use App\Models\Receptivity;
use Illuminate\Database\Seeder;

class ReceptivitySeeder extends Seeder
{
    public function run(): void
    {
        Receptivity::upsert([
            ['id' => 1, 'name' => 'Esperança'],
            ['id' => 2, 'name' => 'Ganho'],
            ['id' => 3, 'name' => 'Perda'],
        ], 'id');
    }
}
