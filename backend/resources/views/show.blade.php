@extends('layout')
@section('title', '商品詳細')
@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <!-- <div class="text-black-50 text-center center-block"> -->
      <div class="col-sm-10 col-lg-3 text-center" >
        <img src="{{ $item->image }}" class="w-100">
        @can('admin')
        <p>↓管理者向け表示↓</p>
        <a href="{{ route('edit', ['id'=>$item->id]) }}" class="btn btn-outline-secondary">編集</a>
        <a href="{{ route('delete', ['id'=>$item->id]) }}" class="btn btn-outline-secondary">削除</a>
        @endcan
      </div>
      <div class="col-sm-10 col-lg-4 text-left text-black-50 ">
        <p><small class="text-muted">ブランド：{{ $item->bland }}</small></p>
        <p>{{ $item->name }}</p>
        <h5>¥{{ $item->price }}<small class="text-muted">（tax incl.）</small></h5>
        <p>形：{{ $item->line }}ワンピース</p>
        <p>総丈：{{ $item->dress_length }} cm</p>
        <a href="{{ $item->url }}" class="btn btn-outline-secondary mb-1">買いに行く？</a>
        @auth
          <form method="POST" action="{{ route('addBookmark') }}">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <input type="submit" value="ブックマーク" class="btn btn-outline-secondary">
          </form>
        @endauth
      </div>
    <!-- </div> -->
  </div>
</div>

@endsection