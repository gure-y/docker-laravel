@extends('layout')
@section('title', '商品編集')
@section('content')

<div class="container">
<form method="POST" action="{{ route('update', ['id'=>$item->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="col-sm-8 col-sm-offset-2 mx-auto">
        <div class="form-group">
            <label for="name"><span class="badge badge-danger">必須</span> 商品名</label>
            <input type="text" id="name" name="name" value="{{ $item->name }}" class="form-control"  autofocus required>
        </div>
        <div class="form-group">
            <label for="bland"><span class="badge badge-danger">必須</span> ブランド</label>
            <input type="text" id="bland" name="bland" value="{{ $item->bland }}" class="form-control"  required>
        </div>
        <div class="form-group">
            <label for="image"><span class="badge badge-danger">必須</span> 画像</label>
            <input type="file" id="image" name="image" value="{{ $item->image }}" required>
        </div>
        <div class="form-group">
            <label for="price"><span class="badge badge-danger">必須</span> 値段</label>
            <input type="text" id="price" name="price" value="{{ $item->price }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="line"><span class="badge badge-danger">必須</span> 形</label>
            <input type="text" id="line" name="line" value="{{ $item->line }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="dress_length"><span class="badge badge-danger">必須</span> 着丈</label>
            <input type="text" id="dress_length" name="dress_length" value="{{ $item->dress_length }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="url"><span class="badge badge-danger">必須</span> URL</label>
            <input type="text" id="url" name="url" class="form-control" value="{{ $item->url }}" required>
        </div>
        <button type="submit" class="btn btn-primary">更新</button>
        <a href="{{ route('index') }}">キャンセル</a>
    </div>
</form>
@endsection