<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Node;
class COAController extends DM_BaseController
{
    protected $panel = 'COA';
    protected $base_route = 'admin.coa';
    protected $view_path = 'admin.coa';
    protected $model;
    protected $table;

    public function __construct()
    {

    }
    function index(){
        // Transform nodes into a structure suitable for jstree
        $nodes = Node::all();

        // Transform nodes into a structure suitable for jstree
        $treeData = $nodes->map(function ($node) use ($nodes) {
            return [
                'id' => $node->id,
                'parent' => $node->parent_id ? $node->parent_id : '#',
                'text' => $node->name,
                'level' => $node->level,
                'parent_name' => $node->parent_id ? $nodes->firstWhere('id', $node->parent_id)->name : 'None',
            ];
        });
        return view(parent::loadView($this->view_path . '.index'), ['nodes' => $treeData]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'txtHeadCode' => 'required|string',
            'txtHeadName' => 'required|string',
            'txtPHead' => 'nullable',
            'txtHeadLevel' => 'required',
            'txtHeadType' => 'required|string'
        ]);

        // Create and save the new node
        $node = new Node();
        $node->head_code = $validated['txtHeadCode'];
        $node->name = $validated['txtHeadName'];
        $node->parent_id = $validated['txtPHead'] ?? null; // Handle null values
        $node->level = $validated['txtHeadLevel'];
        $node->head_type = $validated['txtHeadType'];
        $node->save();

        return response()->json(['message' => 'Node created successfully'], 200);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'txtHeadCode' => 'required|string',
            'txtHeadName' => 'required|string',
            'txtPHead' => 'nullable',
            'txtHeadLevel' => 'required',
            'txtHeadType' => 'required|string'
        ]);

        // Create and save the new node
        $node = Node::findOrFail($id);
        $node->head_code = $validated['txtHeadCode'];
        $node->name = $validated['txtHeadName'];
        $node->parent_id = $validated['txtPHead'] ?? null; // Handle null values
        $node->level = $validated['txtHeadLevel'];
        $node->head_type = $validated['txtHeadType'];
        $node->save();
        return response()->json(['message' => 'Node created successfully'], 200);
    }

}
