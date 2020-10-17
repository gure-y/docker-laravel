<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index(){
      $items =  Item::latest()->get();
      return view('index', ['items' => $items]);
    }

    // createのviewをレンダリング
    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $inputs = $request->all();
        Item::create($inputs);
        return redirect()->route('index');
    }
}
