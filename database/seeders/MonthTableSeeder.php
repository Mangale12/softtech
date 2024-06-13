<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MonthTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { {
            DB::table('months')->insert([
                'month_en' => "January",
                'month_np' => "बैशाख",
            ]);
            DB::table('months')->insert([
                'month_en' => "February",
                'month_np' => "जेष्ठ",
            ]);
            DB::table('months')->insert([
                'month_en' => "March",
                'month_np' => "असार",
            ]);
            DB::table('months')->insert([
                'month_en' => "April",
                'month_np' => "साउन",
            ]);
            DB::table('months')->insert([
                'month_en' => "May",
                'month_np' => "भदौ",
            ]);
            DB::table('months')->insert([
                'month_en' => "June",
                'month_np' => "असोज",
            ]);
            DB::table('months')->insert([
                'month_en' => "July",
                'month_np' => "कार्तिक",
            ]);
            DB::table('months')->insert([
                'month_en' => "August",
                'month_np' => "मंसिर",
            ]);
            DB::table('months')->insert([
                'month_en' => "September",
                'month_np' => "पुष",
            ]);
            DB::table('months')->insert([
                'month_en' => "October",
                'month_np' => "माघ",
            ]);
            DB::table('months')->insert([
                'month_en' => "November",
                'month_np' => "फाल्गुन",
            ]);
            DB::table('months')->insert([
                'month_en' => "December",
                'month_np' => "चैत्र",
            ]);
        }
    }
}
