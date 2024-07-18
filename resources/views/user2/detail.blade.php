@extends('layouts.app2')
@section('title', 'Dashboard')
@section('content')
      <div class="col">
        <div class="catalog-item">
          <img src="{{ asset('storage/judul/' . $data->gambar) }}" alt="Foto Teater">
          <div class="catalog-data-details">
            <h5>Judul Film          : {{ $data->title }}</h5>
            <p>Description          : {{ $data->description }}</p>
            <p>Tayang pada Tanggal  : {{ $data->show_date }}</p>
            <a href="{{ route('user2.index') }}" class="btn btn-danger">Kembali</a>
          </div>
        </div>
      </div>
@endsection