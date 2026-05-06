<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@hiaswana.org'],
            [
                'name'     => 'HIASWANA Admin',
                'password' => bcrypt('Admin@1234'),
                'is_admin' => true,
            ]
        );

        $this->call(SettingsSeeder::class);
    }
}
