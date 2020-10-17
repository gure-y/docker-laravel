@extends('layout')

@section('content')

<form method="POST" action="{{ route('store') }}">
    @csrf
    <p>商品名</p>
    <textarea name="name"></textarea>
    <p>ブランド</p>
    <textarea name="bland"></textarea>
    <p>画像（仮）</p>
    <textarea name="image"></textarea>
    <p>値段</p>
    <input name="price"></input>
    <p>形</p>
    <textarea name="line"></textarea>
    <p>着丈</p>
    <textarea name="dress_length"></textarea>
    <p>URL</p>
    <textarea name="url"></textarea>


    <button type="submit">作成</button>
    <a href="{{ route('index') }}">キャンセル</a>
  </form>

@endsection