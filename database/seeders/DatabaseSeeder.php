<?php

namespace Database\Seeders;

use App\Models\Palika;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UsersTableSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(DistrictTableSeeder::class);
        $this->call(PalikaTableSeeder::class);
        $this->call(MonthTableSeeder::class);
        $this->call(RituTableSeeder::class);
        $this->call(LekhaSirsakSeeder::class);
    }
}
