<?php

namespace Database\Seeders;



use App\Models\Admin;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::create([
            'name' => "Waiter",
            'email' => "waiter@restaurant.com",
            'password' => \Hash::make("123456"),
            'email_verified_at' =>Carbon::now()
        ]);
    }
}
