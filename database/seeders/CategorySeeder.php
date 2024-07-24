<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AccountCategory;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = AccountCategory::create([
            'head_code' => '1000',
            'head_name' => 'सम्पत्ति',
            'parent_id' => null,
            'head_level' => 0,
            'head_type' => 'A'
        ]);

        $child1 = AccountCategory::create([
            'head_code' => '1100',
            'head_name' => 'Child node 1-1',
            'parent_id' => $root->id,
            'head_level' => 1,
            'head_type' => 'A'
        ]);

        $child2 = AccountCategory::create([
            'head_code' => '1200',
            'head_name' => 'Child node 1-2',
            'parent_id' => $root->id,
            'head_level' => 1,
            'head_type' => 'A'
        ]);

        $child11 = AccountCategory::create([
            'head_code' => '1110',
            'head_name' => 'Child node 1-1-1',
            'parent_id' => $child1->id,
            'head_level' => 2,
            'head_type' => 'A'
        ]);

        $child12 = AccountCategory::create([
            'head_code' => '1210',
            'head_name' => 'Child node 1-2-1',
            'parent_id' => $child2->id,
            'head_level' => 2,
            'head_type' => 'A'
        ]);

        $child111 = AccountCategory::create([
            'head_code' => '1111',
            'head_name' => 'Child node 1-1-1-1',
            'parent_id' => $child11->id,
            'head_level' => 3,
            'head_type' => 'A'
        ]);

        $child112 = AccountCategory::create([
            'head_code' => '1211',
            'head_name' => 'Child node 1-2-1-1',
            'parent_id' => $child12->id,
            'head_level' => 3,
            'head_type' => 'A'
        ]);

        AccountCategory::create([
            'head_code' => '11111',
            'head_name' => 'Child node 1-1-1-1-1',
            'parent_id' => $child111->id,
            'head_level' => 4,
            'head_type' => 'A'
        ]);

        AccountCategory::create([
            'head_code' => '12111',
            'head_name' => 'Child node 1-2-1-1-1',
            'parent_id' => $child112->id,
            'head_level' => 4,
            'head_type' => 'A'
        ]);

    }
}
