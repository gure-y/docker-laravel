@extends('layout')
@section('title', 'ワンピース一覧')
@section('content')

<div class="text-black-50 text-center border-bottom mt-5">
  <h5>ALL PRODUCTS</h5>
</div>

<p>検索</p>
<form method="GET" action="{{ route('search') }}">
  @csrf
  <div class="form-group">
    <label for="dress_length">丈</label>
    <input type="number" name="min_dress_length" class="form-control">cm以上
    <input type="number" name="max_dress_length" class="form-control">cm以下
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
    <input type="number" name="price" class="form-control">円以下
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
<button type="submit" class="btn btn-secondary">検索</button>
</form>


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
            <p class="card-text">¥{{ $item->price }}<small class="text-muted"> 税込</small></p>
          </div>
        </div>
      </div>
      @endforeach
    @endif
  </div>
</div>

@endsection