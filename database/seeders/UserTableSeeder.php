<?php

namespace Database\Seeders;

use App\Models\Store;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

    public function run()
    {
//        \DB::table('users')->insert(
//          [
//              'name' => 'Administrador',
//              'email' => 'admin@admin.com',
//              'email_verified_at' => now(),
//              'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//              'remember_token' => 'asasasasas',
//          ]
//        );

        //\App\Models\User::factory(10)->create();


        \App\Models\User::factory( 40)->create()->each(function($user){
            $user->store()->save(\App\Models\Store::factory()->make());
        });
//        $user;
//        $user->store()->save(factory(\App\Models\Store::class)->make());

    }
}
