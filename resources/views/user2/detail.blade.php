@extends('layouts.app2')
@section('title', 'Dashboard')
@section('content')
      <div class="col">
        <div class="catalog-item text-center">
          <img src="{{ asset('storage/judul/' . $data->gambar) }}" alt="Foto Teater" style="width:600px; height:350px mt-3">
          
          <div class="catalog-data-details text-left mt-4">
            <div class="detail-item">
              <h4>{{ $data->title }}</h4>
            </div>

            <div class="detail-item" style="max-width:600px; margin:0 auto;">
              <p style="text-align: center">{{ $data->description }}</p>
            </div>

            <div class="detail-item">
              <p>Show Date : {{ $data->show_date }}</p>
            </div>
            <div class="detail-item">
              <a href="{{ route('user2.index') }}" class="btn btn-danger">Back</a>
            </div> 
          </div>
        </div>
      </div>
@endsection