@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create New Booking Here!') }}</div>

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
                <div class="card-body">
                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="customer_name" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ old('customer_name') }}" required>
                            </div>  
                        </div>

                        <div class="row mb-3">
                            <label for="email"class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="teater_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Theater') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="teater_id" name="teater_id" required>
                                    <option value="" selected disabled>Select Theater</option>
                                    @foreach ($teaters as $teater)
                                    <option value="{{ $teater->id }}" {{ old('teater_id') == $teater->id ? 'selected' : '' }}>{{ $teater->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="seat_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Seat') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="seat_id" name="seat_id" required>
                                    <option value="" selected disabled>Select Seat</option>
                                    @foreach ($seats as $seat)
                                    <option value="{{ $seat->id }}" data-price="{{ $seat->price }}" {{ old('seat_id') == $seat->id ? 'selected' : '' }}>
                                        {{ $seat->seat_number }} - {{ $seat->row }} - {{ $seat->section }} (Rp {{ number_format($seat->price, 0, ',', '.') }})
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="number_ticket" class="col-md-4 col-form-label text-md-end">{{ __('Number of Tickets') }}</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="number_ticket" name="number_ticket" value="{{ old('number_ticket') }}" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="payment_method" class="col-md-4 col-form-label text-md-end">{{ __('Payment Method') }}</label>
                            <div class="col-md-6">
                                <select class="form-select" id="payment_method" name="payment_method" required>
                                    <option value="" selected disabled>Select Payment Method</option>
                                    <option value="credit_card" {{ old('payment_method') == 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                    <option value="ovo" {{ old('payment_method') == 'ovo' ? 'selected' : '' }}>OVO</option>
                                    <option value="gopay" {{ old('payment_method') == 'gopay' ? 'selected' : '' }}>GoPay</option>
                                    <option value="other" {{ old('payment_method') && !in_array(old('payment_method'), ['credit_card', 'ovo', 'gopay']) ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const seatSelect = document.getElementById('seat_id');
    const seatPrice = document.getElementById('seat-price');

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa  = split[0].length % 3,
            rupiah  = split[0].substr(0, sisa),
            ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
        
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp ' + rupiah : '');
    }

    seatSelect.addEventListener('change', function () {
        const selectedOption = seatSelect.options[seatSelect.selectedIndex];
        const price = selectedOption.getAttribute('data-price');
        seatPrice.textContent = formatRupiah(price, 'Rp ');
    });

    seatSelect.dispatchEvent(new Event('change'));
});
</script>
@endsection
