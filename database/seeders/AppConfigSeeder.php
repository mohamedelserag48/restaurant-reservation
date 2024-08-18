<?php

namespace Database\Seeders;



use App\Models\Admin;
use App\Models\AppConfig;
use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AppConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        AppConfig::insert(
            [
                'key' => "taxes_enabled",
                'value' => 1,
            ],
            [
                'key' => "service_enabled",
                'value' => 1,
            ]
        );
    }
}
