@extends('layout')

@section('content')
<div class="text-black-50 text-center border-bottom mt-5">
  <h5>{{ Auth::user()->name }}mypage</h5>
</div>
<p class="text-center">{{ $message ?? ''}}</p><br>
<div class="card-body">
    @foreach($bookmarks as $bookmark)
        <div class="col-md-4 text-left mt-4">
            <div class="card-deck">
            <div class="img-flex-4">
                <div class="card">
                    <a href="{{ route('show', $bookmark->item->id) }}">
                        <p class="card-text"><small class="text-muted">　{{ $bookmark->item->bland }}</small></p>
                        <img src="{{ $bookmark->item->image }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <p class="card-text">¥{{ $bookmark->item->price }}<small class="text-muted"> 税込</small></p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
