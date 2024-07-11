@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('BOOKING LIST') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <h2 align="center">BOOKING HERE</h2>
                {{-- @include('partials.teater-list') --}}

                @if ($message = Session::get('success'))
                    <div class="alert alert-success mt-2 text-center">
                        <p>{{ $message }}</p>
                    </div>
                @endif  

    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr align="center">
                <th>NO</th>
                <th>Title</th>
                <th>Show Date</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teaters as $teater)
                <tr>
                    <td align="center">{{ $loop->iteration }}</td> {{-- untuk nomor iterasi (pengulangan)  --}}
                    <td>{{ $teater->title }}</td>
                    <td align="center">{{ $teater->show_date }}</td>
                    <td align="center">
                        <a class="btn btn-success font-bold py-2 px-4 mb-4 rounded" href="{{ route('booking.create', $teater->id) }}">Book Now</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
    
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection