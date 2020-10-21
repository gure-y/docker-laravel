@extends('layout')
@section('title', '商品詳細')
@section('content')
<div class="container py-4">
  <div class="row">
      <div class="col-md-6 text-left mt-4">
          <a href="{{ route('show', $item->id) }}">
            <img src="../../uploads/{{ $item->image }}" class="card-img-top">
          </a>
          <div class="card-body">
            <p class="card-text"><small class="text-muted">　{{ $item->bland }}</small></p>
            <p class="card-title">{{ $item->name }}</p>
            <p class="card-text">¥{{ $item->price }}</p>
            <p class="card-text">{{ $item->line }}</p>
            <p class="card-text">{{ $item->dress_length }}</p>
            <a href="{{ $item->url }}">買いに行く</a>
            @can('admin')
            <a href="{{ route('edit', ['id'=>$item->id]) }}">編集</a>
            <a href="{{ route('delete', ['id'=>$item->id]) }}" id="btn-bell">削除</a>
            @endcan
            @auth
              <form method="POST" action="{{ route('addBookmark') }}">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type="submit" value="ブックマーク">
              </form>
            @endauth
          </div>
      </div>
  </div>
</div>

@endsection