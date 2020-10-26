@extends('layout')
@section('title', '商品投稿')
@section('content')

<div class="container">
<form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8 col-sm-offset-2 mx-auto">
        <div class="form-group">
            <label for="name"><span class="badge badge-danger">必須</span> 商品名</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="例：かわいいワンピース" autofocus required>
        </div>
        <div class="form-group">
          <label for="bland"><span class="badge badge-danger">必須</span> ブランド</label>
          <select id="bland" name="bland" class="form-control">
            <option valie="指定なし">指定なし</option>
            <option value="GURE">GURE</option>
            <option value="Lara bell">Lara bell</option>
            <option value="bear">bear</option>
          </select>
        </div>
        <div class="form-group">
            <label for="image"><span class="badge badge-danger">必須</span> 画像</label>
            <input type="file" id="image" name="image" required>
        </div>
        <div class="form-group">
            <label for="price"><span class="badge badge-danger">必須</span> 値段</label>
            <input type="text" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="line"><span class="badge badge-danger">必須</span>形</label>
          <select id="line" name="line" class="form-control">
            <option valie="指定なし">指定なし</option>
            <option value="Iライン">Iライン</option>
            <option value="Aライン">Aライン</option>
            <option value="コクーン">コクーン</option>
          </select>
        </div>
        <div class="form-group">
            <label for="dress_length"><span class="badge badge-danger">必須</span> 着丈</label>
            <input type="text" id="dress_length" name="dress_length" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url"><span class="badge badge-danger">必須</span> URL</label>
            <input type="text" id="url" name="url" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">作成</button>
        <a href="{{ route('index') }}">キャンセル</a>
    </div>
</form>
@endsection
    