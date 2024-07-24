<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Node;
class NodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = Node::create(['name' => 'सम्पत्ति', 'parent_id' => null, 'level' => 0]);

        $child1 = Node::create(['name' => 'Child node 1-1', 'parent_id' => $root->id, 'level' => 1]);
        $child2 = Node::create(['name' => 'Child node 1-2', 'parent_id' => $root->id, 'level' => 1]);

        $child11 = Node::create(['name' => 'Child node 1-1-1', 'parent_id' => $child1->id, 'level' => 2]);
        $child12 = Node::create(['name' => 'Child node 1-2-1', 'parent_id' => $child2->id, 'level' => 2]);

        $child111 = Node::create(['name' => 'Child node 1-1-1-1', 'parent_id' => $child11->id, 'level' => 3]);
        $child112 = Node::create(['name' => 'Child node 1-2-1-1', 'parent_id' => $child12->id, 'level' => 3]);

        Node::create(['name' => 'Child node 1-1-1-1-1', 'parent_id' => $child111->id, 'level' => 4]);
        Node::create(['name' => 'Child node 1-2-1-1-1', 'parent_id' => $child112->id, 'level' => 4]);

        $equityRoot = Node::create(['name' => 'इक्विटी/पुँजी', 'parent_id' => null, 'level' => 0]);

        $equityChild1 = Node::create(['name' => 'Child node 2-1', 'parent_id' => $equityRoot->id, 'level' => 1]);
        $equityChild2 = Node::create(['name' => 'Child node 2-2', 'parent_id' => $equityRoot->id, 'level' => 1]);

        $equityChild11 = Node::create(['name' => 'Child node 2-1-1', 'parent_id' => $equityChild1->id, 'level' => 2]);
        $equityChild12 = Node::create(['name' => 'Child node 2-2-1', 'parent_id' => $equityChild2->id, 'level' => 2]);

        $equityChild111 = Node::create(['name' => 'Child node 2-1-1-1', 'parent_id' => $equityChild11->id, 'level' => 3]);
        $equityChild112 = Node::create(['name' => 'Child node 2-2-1-1', 'parent_id' => $equityChild12->id, 'level' => 3]);

        Node::create(['name' => 'Child node 2-1-1-1-1', 'parent_id' => $equityChild111->id, 'level' => 4]);
        Node::create(['name' => 'Child node 2-2-1-1-1', 'parent_id' => $equityChild112->id, 'level' => 4]);

        $equityRoot = Node::create(['name' => 'खर्च', 'parent_id' => null, 'level' => 0]);

        $equityChild1 = Node::create(['name' => 'Child node 2-1', 'parent_id' => $equityRoot->id, 'level' => 1]);
        $equityChild2 = Node::create(['name' => 'Child node 2-2', 'parent_id' => $equityRoot->id, 'level' => 1]);

        $equityChild11 = Node::create(['name' => 'Child node 2-1-1', 'parent_id' => $equityChild1->id, 'level' => 2]);
        $equityChild12 = Node::create(['name' => 'Child node 2-2-1', 'parent_id' => $equityChild2->id, 'level' => 2]);

        $equityChild111 = Node::create(['name' => 'Child node 2-1-1-1', 'parent_id' => $equityChild11->id, 'level' => 3]);
        $equityChild112 = Node::create(['name' => 'Child node 2-2-1-1', 'parent_id' => $equityChild12->id, 'level' => 3]);

        Node::create(['name' => 'Child node 2-1-1-1-1', 'parent_id' => $equityChild111->id, 'level' => 4]);
        Node::create(['name' => 'Child node 2-2-1-1-1', 'parent_id' => $equityChild112->id, 'level' => 4]);

        $equityRoot = Node::create(['name' => 'आय', 'parent_id' => null, 'level' => 0]);

        $equityChild1 = Node::create(['name' => 'Child node 2-1', 'parent_id' => $equityRoot->id, 'level' => 1]);
        $equityChild2 = Node::create(['name' => 'Child node 2-2', 'parent_id' => $equityRoot->id, 'level' => 1]);

        $equityChild11 = Node::create(['name' => 'Child node 2-1-1', 'parent_id' => $equityChild1->id, 'level' => 2]);
        $equityChild12 = Node::create(['name' => 'Child node 2-2-1', 'parent_id' => $equityChild2->id, 'level' => 2]);

        $equityChild111 = Node::create(['name' => 'Child node 2-1-1-1', 'parent_id' => $equityChild11->id, 'level' => 3]);
        $equityChild112 = Node::create(['name' => 'Child node 2-2-1-1', 'parent_id' => $equityChild12->id, 'level' => 3]);

        Node::create(['name' => 'Child node 2-1-1-1-1', 'parent_id' => $equityChild111->id, 'level' => 4]);
        Node::create(['name' => 'Child node 2-2-1-1-1', 'parent_id' => $equityChild112->id, 'level' => 4]);

        $equityRoot = Node::create(['name' => 'दायित्व', 'parent_id' => null, 'level' => 0]);

        $equityChild1 = Node::create(['name' => 'Child node 2-1', 'parent_id' => $equityRoot->id, 'level' => 1]);
        $equityChild2 = Node::create(['name' => 'Child node 2-2', 'parent_id' => $equityRoot->id, 'level' => 1]);

        $equityChild11 = Node::create(['name' => 'Child node 2-1-1', 'parent_id' => $equityChild1->id, 'level' => 2]);
        $equityChild12 = Node::create(['name' => 'Child node 2-2-1', 'parent_id' => $equityChild2->id, 'level' => 2]);

        $equityChild111 = Node::create(['name' => 'Child node 2-1-1-1', 'parent_id' => $equityChild11->id, 'level' => 3]);
        $equityChild112 = Node::create(['name' => 'Child node 2-2-1-1', 'parent_id' => $equityChild12->id, 'level' => 3]);

        Node::create(['name' => 'Child node 2-1-1-1-1', 'parent_id' => $equityChild111->id, 'level' => 4]);
        Node::create(['name' => 'Child node 2-2-1-1-1', 'parent_id' => $equityChild112->id, 'level' => 4]);
    }
}
