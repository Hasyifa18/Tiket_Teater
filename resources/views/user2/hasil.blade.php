@extends('layouts.app2')
@section('title', 'Result Checkout')
@section('content')
<div class="col">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Teater ID</th>
                <th>Number Ticket</th>
                <th>Payment</th>
                <th>Seat</th>
                <th>Buy IT</th>
                <th>Bukti</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->customer_name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->phone }}</td>
                <td>{{ $item->teater_id }}</td>
                <td>{{ $item->number_ticket }}</td>
                <td>{{ $item->payment_method}}</td>
                <td>{{ $item->seat_id}}</td>
                <td>{{ $item->created_at }}</td>
                <td>
                    @if(isset($item->bukti))
                        <img src="{{ asset('storage/foto/' . $item->bukti) }}" alt="Bukti" class="img-fluid">
                    @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#darkModal">
                            Upload Bukti
                        </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="modal fade" id="darkModal" tabindex="-1" aria-labelledby="darkModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="darkModalLabel">Dark Themed Modal</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('storeBukti') }}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div>
                    <h3 class="text-center"> Scan for Detail Information</h3>
                    <img src="{{ asset('images/qr.png') }}" alt="" style="display: flex; margin:auto">
                </div>
                    <div class="form-group">
                        <label for="id">Payment</label>
                        <select class="form-select" name="id" id="id">
                            @foreach($data as $item)
                            <option value="{{ $item->id }}">{{ $item->created_at }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <label for="bukti">File Transfer</label>
                        <input type="file" class="form-control" name="bukti" id="bukti">
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection