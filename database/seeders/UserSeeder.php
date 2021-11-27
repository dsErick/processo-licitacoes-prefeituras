<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\{QueryException, Seeder};

class UserSeeder extends Seeder
{
    public function run(): void
    {
        try {
            User::factory()->create([
                'name' => 'Erick Silva',
                'email' => 'erick@mail.com',
                'password' => bcrypt('password'),
            ]);
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                return;
            }

            throw $e;
        }
    }
}
