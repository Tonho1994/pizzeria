<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(10)->create();
        $user= User::create([
            'id' => 1,
            'name' => 'Antonio Morales Zuñiga',
            'email' => 'tonho@correo.com',
            'password' => Hash::make('Admin123')
        ]);
        $user->save;

    }
}
