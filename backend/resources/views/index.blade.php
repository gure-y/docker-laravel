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
      <img src="image/onepiece.jpg?<?php echo date("YmdHis");?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/onepiece2.jpg?<?php echo date("YmdHis");?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="image/onepiece3.jpg?<?php echo date("YmdHis");?>" class="d-block w-100" alt="...">
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
            <img src="{{ $item->image }}" class="card-img-top">
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