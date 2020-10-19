@extends('layout')
@section('title', '商品詳細')
@section('content')
<div class="card">
  <p class="card-text"><small class="text-muted">　{{ $item->bland }}</small></p>
  <img src="../../uploads/{{ $item->image }}" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">{{ $item->name }}</h5>
    <p class="card-text">¥{{ $item->price }}</p>
    <p class="card-text">{{ $item->line }}</p>
    <p class="card-text">{{ $item->dress_length }}</p>
    <a href="{{ $item->url }}">買いに行く</a>
    <a href="{{ route('edit', ['id'=>$item->id]) }}">編集</a>
    <a href="{{ route('delete', ['id'=>$item->id]) }}" id="btn-bell">削除</a>
    <form method="POST" action="{{ route('addBookmark') }}">
      @csrf
      <input type="hidden" name="item_id" value="{{ $item->id }}">
      <input type="submit" value="ブックマーク">
    </form>
  </div>
</div>
@endsection