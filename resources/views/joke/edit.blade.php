@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card bg-transparent text-white border-secondary">
                <div class="card-header bg-black">{{ __('Edit Joke') }}</div>

                <div class="card-body bg-transparent">
                    <form id="edit" method="POST" action="/jokes/{{ $joke->id }}?redirect={{$redirect}}">
                        @csrf
                        @method("PATCH")

                        <div class="row mb-3">
                            <label for="content" class="col-md-4 col-form-label text-md-end">{{ __('Content') }}</label>

                            <div class="col-md-6">
                                <textarea
                                    id="content"
                                    name="content"
                                    class="form-control @error('content') is-invalid @enderror"
                                    rows="5" required autocomplete="content">{{ old('content') ?? $joke->content }}</textarea>

                                @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                    <form id="delete" method="POST" action="/jokes/{{ $joke->id }}">
                        @csrf
                        @method("DELETE")
                    </form>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-danger" form="delete" style="width:75px">
                                {{ __('Delete') }}
                            </button>
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
