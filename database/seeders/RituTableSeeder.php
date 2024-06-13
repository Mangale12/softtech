<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RituTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ritus')->insert([
            'ritu_en' => "spring season",
            'ritu_np' => "वसन्त ऋतु",
        ]);
        DB::table('ritus')->insert([
            'ritu_en' => "summer season",
            'ritu_np' => "ग्रीष्म ऋतु",
        ]);
        DB::table('ritus')->insert([
            'ritu_en' => "rainy season",
            'ritu_np' => "वर्षा ऋतु",
        ]);
        DB::table('ritus')->insert([
            'ritu_en' => "autumn season",
            'ritu_np' => "शरद ऋतु",
        ]);
        DB::table('ritus')->insert([
            'ritu_en' => "winter season",
            'ritu_np' => "हेमन्त ऋतु",
        ]);
        DB::table('ritus')->insert([
            'ritu_en' => "winter season ",
            'ritu_np' => "शिशिर ऋतु ",
        ]);
    }
}
