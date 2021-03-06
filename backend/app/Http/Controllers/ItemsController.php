<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ItemValid; //バリデーション
use Illuminate\Support\Facades\Auth; //ユーザー認証
use App\Models\Item; //itemモデル
use App\Models\Bookmark; //bookmarkモデル、、、。
use Storage;

class ItemsController extends Controller
{
    public function index(){
      $items =  Item::inRandomOrder()->take(4)->get();
      return view('index', ['items' => $items]);
    }
    
    public function create(){
        return view('create');// createのviewをレンダリング
    }

    public function store(ItemValid $request){
        $item = new item;
        $item->name = $request->name;
        $item->bland = $request->bland;
        $item->price = $request->price;
        $item->line = $request->line;
        $item->dress_length = $request->dress_length;
        $item->url = $request->url;
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/',$image,'public');
        $item->image = Storage::disk('s3')->url($path);
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
        $item = Item::find($request['id']);
        $item->name = $request->name;
        $item->bland = $request->bland;
        $item->price = $request->price;
        $item->line = $request->line;
        $item->dress_length = $request->dress_length;
        $item->url = $request->url;
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('/',$image,'public');
        $item->image = Storage::disk('s3')->url($path);
        $item->save();
        return redirect()->route('index');
    }

    public function delete($id){
        if (empty($id)) {
            \Session::flash('err_msg', 'データがありません');
            return redirect()->route('index');
        }
        $item = Item::destroy($id);
        $image = Storage::disk('s3');
        $image->delete('/');
        return redirect()->route('index');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('show', ['item' => $item]);
    }

    public function bookmark()
    {
        $user_id = Auth::id();
        $bookmarks = Bookmark::where('user_id', $user_id)->get();
        return view('bookmark',['bookmarks' => $bookmarks]);
    }

    public function addBookmark(Request $request)
    {
        $user_id = Auth::id();
        $item_id = $request->item_id;
        $bookmark_add_info = Bookmark::firstOrCreate(['item_id' =>$item_id, 'user_id' =>$user_id]);
        if($bookmark_add_info->wasRecentlyCreated){
            $message = 'ブックマークしました';
        }
        else{
            $message = 'ブックマーク済みです';
        }
        $bookmarks = Bookmark::where('user_id', $user_id)->get();
        return view('bookmark', compact('bookmarks', 'message'));
    }

    public function adminpage(){
        $items =  Item::latest()->get();
        return view('adminpage', ['items' => $items]);
    }

    public function list(){
        $items =  Item::latest()->get();
        return view('list', ['items' => $items]);
    }

    public function search(Request $request){
        $query = Item::query();

        $searchName = $request->input('name');
        $searchPrice = $request->input('price');
        $searchLine = $request->input('line');
        $searchBland = $request->input('bland');
        $searchLengthMin = $request->input('min_dress_length');
        $searchLengthMax = $request->input('max_dress_length');

        if ($request->filled('name')) {
            $query->where('name', 'like', '%'.$searchName.'%')->get(); //部分一致検索
        }

        if ($request->filled('line') && $searchLine != ('指定なし')) {
            $query->where('line', $searchLine)->get();
        }
        
        if ($request->filled('bland') && $searchBland != ('指定なし')) {
            $query->where('bland', $searchBland)->get();
        }

        if ($request->filled('min_dress_length') && $request->filled('max_dress_length')) {
            $query->whereBetween('dress_length', [$searchLengthMin, $searchLengthMax])->get();
        } elseif ($request->filled('min_dress_length')) {
            $query->where('dress_length', '>=', $searchLengthMin)->get();
        } elseif ($request->filled('max_dress_length')) {
            $query->where('dress_length', '<=', $searchLengthMax)->get();
        }
        
        if ($request->filled('price')) {
        $query->where('price', '<=', $searchPrice)->get();
        }

        $data = $query->paginate(15);

        return view('search', ['data' => $data]);
    }
}
