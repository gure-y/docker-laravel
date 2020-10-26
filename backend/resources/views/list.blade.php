@extends('layout')
@section('title', 'ワンピース一覧')
@section('content')

<div class="text-black-50 text-center border-bottom mt-5">
  <h5>ALL PRODUCTS</h5>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm-3 text-black-50 border-right mt-2">
      <div class="text-black-50 text-center border-bottom mt-3">
        <h6>ワンピース検索</h6>
      </div>
      <form method="GET" action="{{ route('search') }}">
        @csrf
        <div class="form-group mt-3">
          <label for="dress_length">ワンピース丈</label>
          <input type="number" name="min_dress_length" class="form-control"><p class="text-right small">cm以上</p>
          <input type="number" name="max_dress_length" class="form-control"><p class="text-right small">cm以下</p>
        </div>
        <div class="form-group">
          <label for="line">ワンピースの形</label>
          <select id="line" name="line" class="form-control">
            <option valie="指定なし">指定なし</option>
            <option value="Iライン">Iライン</option>
            <option value="Aライン">Aライン</option>
            <option value="コクーン">コクーン</option>
          </select>
        </div>
        <div class="form-group">
          <label for="price">価格</label>
          <input type="number" name="price" class="form-control"><p class="text-right small">円以下</p>
        </div>
        <div class="form-group">
          <label for="name">商品名</label>
          <input type="text" id="name" name="name" class="form-control" placeholder="指定なし">
        </div>
        <div class="form-group">
          <label for="bland">ブランド</label>
          <select id="bland" name="bland" class="form-control">
            <option valie="指定なし">指定なし</option>
            <option value="bedsidedrama">bedsidedrama</option>
            <option value="Candy Stripper">Candy Stripper</option>
            <option value="CIAOPANIC">CIAOPANIC</option>
            <option value="ehka sopo">ehka sopo</option>
          </select>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-secondary ">検索</button>
        </div>
      </form>
    </div>

    @if(!isset($items[0]))
      <span>登録なし</span>
    @else
    <div class="col-sm-9">
      <div class="row">
      @foreach ($items as $item)
        <div class="col-sm-4 text-left mt-4">
          <div class="card">
            <a href="{{ route('show', $item->id) }}">
              <p><small class="text-muted">　{{ $item->bland }}</small></p>
              <img src="{{ $item->image }}" class="card-img-top p-1">
            </a>
            <div>
              <p class="card-text m-2">¥{{ $item->price }}<small class="text-muted">（tax incl.）</small></p>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      </div>
    @endif
  </div>
</div>

@endsection