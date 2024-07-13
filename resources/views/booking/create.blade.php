@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bookingggg') }}</div>
                    @if ($errors->any())
                    <div class=" mb-4">
                        <ul class="list-disc list-inside text-red-500">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                     @endif

                <div class="card-body">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="teater">Title</label>
                            <select class="form-control" id="teater" name="teater_id" required>
                                <option value="" disabled selected>Select Theater</option>
                                @foreach($teaters as $teater)
                                    <option value="{{ $teater->id }}">{{ $teater->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tickets">Quantity</label>
                            <input type="number" class="form-control" id="tickets" name="tickets" min="1" required>
                        </div>

                        <div class="form-group">
                            <label for="payment">Payment Method</label>
                            <select class="form-control" id="payment" name="payment" required>
                                <option value="" disabled selected>Select Payment Method</option>
                                <option value="gopay">Gopay</option>
                                <option value="ovo">OVO</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>
            
                    </form>
                </div>

            
                <div class="text-center mb-2" > <!-- Menggunakan text-center untuk mengatur tombol ke tengah -->
                    <button type="submit" class="btn btn-primary">
                        {{ __('Submit') }}
                    </button>
                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection