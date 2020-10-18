@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ Auth::user()->name }}mypage</div>

                <div class="card-body">
                    @foreach($bookmarks as $bookmark)
                        <div class="col-md-4 text-left mt-4">
                            <div class="card-deck">
                            <div class="img-flex-4">
                                <div class="card">
                                <p class="card-text"><small class="text-muted">　{{ $bookmark->item->bland }}</small></p>
                                <img src="../../uploads/{{ $bookmark->item->image }}" class="card-img-top">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $bookmark->item->name }}</h5>
                                        <p class="card-text">¥{{ $bookmark->item->price }}</p>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
