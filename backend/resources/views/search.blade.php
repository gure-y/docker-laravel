@extends('layout')
@section('title', '検索結果')
@section('content')

<div class="text-black-50 text-center border-bottom mt-5">
  <h5>RESULT</h5>
</div>

<div class="container py-4 center-block">
  <div class="row">
    @if(!isset($data[0]))
      <span>検索結果はありません</span>
    @else
      @foreach ($data as $item)
      <div class="col-md-3 text-left mt-4">
        <div class="card">
          <a href="{{ route('show', $item->id) }}">
            <p class="card-text"><small class="text-muted">　{{ $item->bland }}</small></p>
            <img src="{{ $item->image }}" class="card-img-top">
          </a>
          <div class="card-body">
            <p class="card-text">¥{{ $item->price }}<small class="text-muted"> 税込</small></p>
          </div>
        </div>
      </div>
      @endforeach
      {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
    @endif
  </div>
</div>

@endsection