<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LekhaSirsakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            DB::table('lekha_sirsaks')->insert([
                'title' => 'शेयर'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'कोष हिसाब'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'निक्षेप'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'नगद'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'बैंक'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'लिएको ऋण'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'लिनुपर्ने हिसाब'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'लगानी'
            ]);
            DB::table('lekha_sirsaks')->insert([
                'title' => 'सम्पती'
            ]);
        }
    }
}
