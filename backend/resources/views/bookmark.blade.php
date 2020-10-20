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
                        <img src="../../uploads/{{ $bookmark->item->image }}" class="card-img-top">
                    </a>
                    <div class="card-body">
                        <p class="card-title">{{ $bookmark->item->name }}</p>
                        <p class="card-text">¥{{ $bookmark->item->price }}</p>
                    </div>
                </div>
            </div>
            </div>
        </div>
    @endforeach
</div>

@endsection
