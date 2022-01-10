@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-8 text-white px-5">
            <div class="card bg-transparent text-white border-secondary">
                <div class="card-header bg-black">{{ __('Edit Profile') }}</div>

                <div class="card-body bg-transparent">
                    <form id="edit" method="POST" action="/profiles/{{ $profile->id }}?redirect={{ $redirect }}" enctype="multipart/form-data">
                        @csrf
                        @method("PATCH")

                        <div class="row mb-3">
                            <label for="pic" class="col-md-4 col-form-label text-md-end">{{ __('Picture') }}</label>

                            <div class="col-md-6">
                                <input
                                    id="pic"
                                    type="file"
                                    class="form-control @error('pic') is-invalid @enderror"
                                    name="pic"
                                    value="{{ old('pic') }}"
                                    autocomplete="pic">

                                @error('pic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') ?? $profile->user->name }}"
                                    required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="bio" class="col-md-4 col-form-label text-md-end">{{ __('Bio') }}</label>

                            <div class="col-md-6">
                                <textarea
                                    id="bio"
                                    name="bio"
                                    class="form-control @error('bio') is-invalid @enderror"
                                    rows="5" autocomplete="bio">{{ old('bio') ?? $profile->bio }}</textarea>

                                @error('bio')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input
                                    id="birthdate"
                                    type="date"
                                    class="form-control @error('birthdate') is-invalid @enderror"
                                    name="birthdate"
                                    value="{{ old('birthdate') ?? $profile->birthdate }}"
                                    autocomplete="birthdate">

                                @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success" form="edit" style="width:75px">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
