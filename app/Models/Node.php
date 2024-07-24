<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'parent_id', 'level',
    ];

    // public function parent()
    // {
    //     return $this->belongsTo(Node::class, 'parent_id');
    // }

    // public function childrens()
    // {
    //     return $this->hasMany(Node::class, 'parent_id');
    // }

    // public function isLeaf()
    // {
    //     return !$this->children()->exists();
    // }

    // public function children()
    // {
    //     return $this->hasMany(Node::class, 'parent_id');
    // }

    public function parent()
    {
        return $this->belongsTo(Node::class, 'parent_id');
    }

    // Define the children relationship
    public function children()
    {
        return $this->hasMany(Node::class, 'parent_id');
    }

    // Check if the node is a leaf (has no children)
    public function isLeaf()
    {
        return !$this->children()->exists();
    }

    public function descendants()
    {
        return $this->descendantsOf($this->id);
    }

    // Recursive function to get descendants
    public function descendantsOf($nodeId)
    {
        $descendants = collect();
        $children = Node::where('parent_id', $nodeId)->get();

        foreach ($children as $child) {
            $descendants = $descendants->merge($this->descendantsOf($child->id));
        }

        return $descendants->merge($children);
    }

    public function ancestors()
    {
        $ancestors = collect();
        $currentNode = $this;

        while ($currentNode->parent) {
            $ancestors->push($currentNode->parent);
            $currentNode = $currentNode->parent;
        }

        return $ancestors;
    }
}
