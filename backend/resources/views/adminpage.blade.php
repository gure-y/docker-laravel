@extends('layout')
@section('title', '管理者用ページ')
@section('content')

<div class="text-black-50 text-center border-bottom mt-5">
  <h5>ALL PRODUCTS</h5>
</div>
<a href="{{ route('create') }}">商品を追加</a>

<div class="container py-4 center-block">
  <div class="row">
    @if(!isset($items[0]))
      <span>登録なし</span>
    @else
      @foreach ($items as $item)
      <div class="col-md-3 text-left mt-4">
        <div class="card">
          <a href="{{ route('show', $item->id) }}">
            <p class="card-text"><small class="text-muted">　{{ $item->bland }}</small></p>
            <img src="../../uploads/{{ $item->image }}" class="card-img-top">
          </a>
          <div class="card-body">
            <p class="card-title">{{ $item->name }}</p>
            <p class="card-text">¥{{ $item->price }}</p>
          </div>
        </div>
      </div>
      @endforeach
    @endif
  </div>
</div>

@endsection