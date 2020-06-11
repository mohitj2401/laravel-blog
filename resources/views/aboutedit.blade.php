@extends('layouts.applayout')

@section('content')
<section class="blog-list px-3 py-5 p-md-5">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit About') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('about.edit',auth()->user()->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                    
        
                        
                        <div class="form-group row">
                            <label for="file" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                            <input id="file" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{auth()->user()->image}}"  autofocus>

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="about" class="col-md-4 col-form-label text-md-right">{{ __('About') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" type="text" class="form-control @error('about') is-invalid @enderror" name="about" required autocomplete="about" autofocus>{{ auth()->user()->about }}</textarea>

                                @error('about')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update About') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div></section>
@endsection
