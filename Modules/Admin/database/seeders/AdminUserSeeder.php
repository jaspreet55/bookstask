<?php

namespace Modules\Admin\database\seeders;
use Modules\Admin\app\Models\AdminUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminUser::create([
            'username' => 'admin',
            'firstname' => 'admin',
            'lastname'  => 'user',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'remember_token' => Str::random(10),
        ]);
    }
}
