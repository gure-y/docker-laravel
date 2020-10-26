@extends('layout')
@section('title', 'ブックマーク一覧')
@section('content')
<div class="text-black-50 text-center border-bottom mt-5">
  <h5>MY BOOKMARK PRODUCTS</h5>
</div>

@if(!isset($bookmarks[0]))
  <div class="text-black-50 text-center">
    <p>ブックマークした商品はありません</p>
  </div>
@endif
  
<p class="text-center">{{ $message ?? ''}}</p><br>
<div class="container py-4">
    <div class="row">
        @foreach($bookmarks as $bookmark)
        <div class="col-md-3 text-left mt-4">
            <div class="card">
                <a href="{{ route('show', $bookmark->item->id) }}">
                    <p class="card-text"><small class="text-muted">　{{ $bookmark->item->bland }}</small></p>
                    <img src="{{ $bookmark->item->image }}" class="card-img-top">
                </a>
                <div class="card-body">
                    <p class="card-text">¥{{ $bookmark->item->price }}<small class="text-muted"> (tax incl.)</small></p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
