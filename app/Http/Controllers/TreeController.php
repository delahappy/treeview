<?php

namespace App\Http\Controllers;

use App\Events\CreateTree;
use App\Tree;
use Illuminate\Http\Request;

class TreeController extends Controller
{
    public function create(Request $request) {
        $tree = new Tree();
        $tree->name = $request->get('name');
        $tree->save();
        event(new CreateTree($tree));
        return response()->json($tree);
    }

    public function view($id) {
        $tree = Tree::find($id);
        $data['tree'] = $tree;
        return view('treeview', $data);
    }
}
