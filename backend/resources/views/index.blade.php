@extends('layout')

@section('content')

  <a href="{{ route('create') }}">商品を追加</a>
  @if(!isset($items[0]))
    <span>登録なし</span>
  @else
    @foreach ($items as $item)
    <div>
      <span>商品名{{ $item->name }}</span>
      <span>ブランド{{ $item->bland }}</span>
      <span>値段{{ $item->price }}</span>
      <span>画像{{ $item->image }}</span>
    </div>
    @endforeach
  @endif

@endsection