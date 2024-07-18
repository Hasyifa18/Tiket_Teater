@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Theater') }}</div>
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
                    <form action="{{ route('teater.update', $teater->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{__('Title') }}</label>
                            
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" value="{{ $teater->title }}" class="form-control">
                            </div> 
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                        
                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-control">{{ $teater->description }}</textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gambar" class="col-md-4 col-form-label text-md-end">{{ __('gambar') }}</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="gambar" id="gambar">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="show_date" class="col-md-4 col-form-label text-md-end">{{ __('Show Date') }}</label>
                        
                            <div class="col-md-6">
                                <input type="date" name="show_date" id="show_date" value="{{ $teater->show_date }}" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('teater.index') }}" class="btn btn-secondary mr-2">{{ __('Cancel') }}</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
