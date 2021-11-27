<?php

namespace Database\Seeders;

use App\Models\ActivityType;
use Illuminate\Database\Seeder;

class ActivityTypeSeeder extends Seeder
{
    public function run(): void
    {
        ActivityType::upsert([
            ['id' => 1, 'name' => 'Telefonema'],
            ['id' => 2, 'name' => 'Email'],
            ['id' => 3, 'name' => 'Visita'],
        ], 'id');
    }
}
