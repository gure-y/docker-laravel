@extends('layout')
@section('title', '商品編集')
@section('content')

<form method="POST" action="{{ route('update', ['id'=>$item->id]) }}" enctype="multipart/form-data">
    @csrf

    <p>商品名</p>
    <input name="name" value="{{ $item->name }}">
    <p>ブランド</p>
    <input name="bland" value="{{ $item->bland }}">
    <p>画像</p>
    <input type="file" name="image" value="{{ $item->image }}">
    <p>値段</p>
    <input name="price" value="{{ $item->price }}">
    <p>形</p>
    <input name="line" value="{{ $item->line }}">
    <p>着丈</p>
    <input name="dress_length" value="{{ $item->dress_length }}">
    <p>URL</p>
    <input name="url" value="{{ $item->url }}">


    <button type="submit">更新</button>
    <a href="{{ route('index') }}">キャンセル</a>
  </form>

@endsection