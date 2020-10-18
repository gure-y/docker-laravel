@extends('layout')
@section('title', '商品一覧')
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image/onepiece.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/onepiece2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/onepiece3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="text-black-50 text-center border-bottom mt-5">
  <h5>FEATURED PRODUCTS</h5>
</div>

<div class="container py-4">
  @if(!isset($items[0]))
    <span>登録なし</span>
  @else
    @foreach ($items as $item)
    <div class="col-md-4 text-left mt-4">
      <div class="card-deck">
        <div class="img-flex-4">
          <div class="card">
            <p class="card-text"><small class="text-muted">　{{ $item->bland }}</small></p>
            <img src="../../uploads/{{ $item->image }}" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">{{ $item->name }}</h5>
              <p class="card-text">¥{{ $item->price }}</p>
              <a href="{{ route('edit', ['id'=>$item->id]) }}">編集</a>
              <a href="{{ route('delete', ['id'=>$item->id]) }}" id="btn-bell">削除</a>
              <form method="POST" action="{{ route('addBookmark') }}">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">
                <input type="submit" value="ブックマーク">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  @endif
</div>
<a href="{{ route('create') }}">商品を追加</a>

@endsection