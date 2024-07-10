@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-20">
            <div class="card">
                <div class="card-header">{{ __('Edit Theater') }}</div>
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
                    <form method="POST" action="{{ route('teater.update', $teater->id) }}">
                        @csrf
                        @method ('PUT')

                        <div class="row mb-4">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>
                            <div class="col-md-6">
                                <input type="text" name="title" id="title" value="{{ $teater->title }}" class="form-input mt-1 block w-full">
                          
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" class="form-textarea mt-1 block w-full">{{ $teater->description }}</textarea>
                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="show_date" class="col-md-4 col-form-label text-md-end">{{ __('Show Date') }}</label>

                            <div class="col-md-6">
                               <input type="date" name="show_date" id="show_date" value="{{ $teater->show_date }}" class="form-input mt-1 block w-full">
                             
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="flex justify-end mt-4">
                            <a href="{{ route('teater.index') }}" class="btn btn-secondary mr-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Update Theater</button>
                        </div> 
                        </div>
                       
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection