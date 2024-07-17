@extends('layouts.app2')
@section('title', 'checkout')
@section('content')
<div class="d-flex justify-content-center">
    <div class="card bg-dark text-white" style="width: 100%">
        <div class="card-body">
            <form action="{{ route('user2.store') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <label for="customer_name" class="col-md-4 col-form-label text-md-end">{{ __('Customer Name') }}</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $user->name }}" required readonly>
                    </div>  
                </div>

                <div class="row mb-3">
                    <label for="email"class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required readonly>
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
                        <input type="text" class="form-control" id="teater_id" name="teater_id" value="{{ $data->id }}" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="seat_id" class="col-md-4 col-form-label text-md-end">{{ __('Select Seat') }}</label>
                    <div class="col-md-6">
                        <select class="form-select" id="seat_id" name="seat_id" required>
                            <option value="" selected disabled>Select Seat</option>
                            @foreach ($data3 as $seat)
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
@endsection