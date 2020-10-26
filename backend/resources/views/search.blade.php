@extends('layout')
@section('title', '検索結果')
@section('content')

<div class="text-black-50 text-center border-bottom mt-5">
  <h5>RESULT</h5>
</div>

@if(isset($data[0]))
  <div class="text-black-50 text-center">
    <p>{{ $data->count() }}件見つかりました</p>
  </div>
@endif

@if(!isset($data[0]))
  <div class="text-black-50 text-center">
    <p>検索結果はありません</p>
  </div>
@else
  <div class="container py-4">
    <div class="row">
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
      </div>
    </div>
    {{ $data->appends(request()->input())->render('pagination::bootstrap-4') }}
@endif
  
@endsection