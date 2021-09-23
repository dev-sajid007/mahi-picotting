<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([

            'role_id' => Role::where('slug','super-admin')->first()->id,
            'name' => 'Sajid Hasan',
            'email' => 'admin@gmail.com',
            'phone' => '01683813854',
            'password' => Hash::make('123'),
            'status' => true,
            'deleteable' => false

        ]);

        User::updateOrCreate([

            'role_id' => Role::where('slug','user')->first()->id,
            'name' => 'Nafiz Ahmed',
            'email' => 'user@gmail.com',
            'phone' => '01998366320',
            'password' => Hash::make('123'),
            'status' => false

        ]);
    }
}
