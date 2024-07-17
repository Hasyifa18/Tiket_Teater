@extends('layouts.app2')
@section('title', 'Dashboard')
@section('content')
    @foreach($data as $item)
      <div class="col-md-4">
        <div class="catalog-item">
          <img src="{{ asset('storage/judul/' . $item->gambar) }}" alt="Foto Teater" style="width:100%; height:200px">
          <div class="catalog-item-details">
            <a href="{{ route('detailT', $item->id) }}" class="btn btn-primary">Lihat Detail</a>
            <a href="{{ route('checkout', $item->id) }}" class="btn btn-secondary">Checkout</a>
          </div>
        </div>
      </div>
    @endforeach
@endsection