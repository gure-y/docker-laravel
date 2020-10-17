<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ItemValid;
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

    public function store(ItemValid $request){
        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        $item = new item;
        $item->name = $request->name;
        $item->bland = $request->bland;
        $item->price = $request->price;
        $item->line = $request->line;
        $item->dress_length = $request->dress_length;
        $item->url = $request->url;
        $item->image = $fileName;
        $item->save();
        return redirect()->route('index');
    }

    public function edit($id){
        $item = Item::find($id);

        if (is_null($item)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect()->route('index');
        }
        return view('edit', ['item' => $item]);
    }
    public function update(ItemValid $request){
        if ($file = $request->image) {
            $fileName = time() . $file->getClientOriginalName();
            $target_path = public_path('uploads/');
            $file->move($target_path, $fileName);
        } else {
            $fileName = "";
        }
        $item = Item::find($request['id']);
        $item->name = $request->name;
        $item->bland = $request->bland;
        $item->price = $request->price;
        $item->line = $request->line;
        $item->dress_length = $request->dress_length;
        $item->url = $request->url;
        $item->image = $fileName;
        $item->save();
        return redirect()->route('index');
    }

}
