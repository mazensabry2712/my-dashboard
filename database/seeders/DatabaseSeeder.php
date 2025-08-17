<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // اتأكد إن رول admin موجود
        Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);

        // أنشئ اليوزر
        $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password'=> bcrypt('password'),
            ]
        );

        // اربطه بالرول
        $user->assignRole('admin');

        // باقي السييدرز
        $this->call(BrandSeeder::class);
        $this->call(RoleSeeder::class);
    }
}
