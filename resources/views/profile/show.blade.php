@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-8 text-white">
            <div class="row bg-transparent text-white">
                <div class="col-md-4">
                    <a href="{{ $profile->imagePath }}">
                        <img src="{{ $profile->imagePath }}" width="200px" height="200px">
                    </a>
                </div>
                <div class="col-sm">
                    <div class="row">
                        <div class="col-sm">
                            <h2 class="fw-bolder">{{ $profile->user->name }}</h1>
                        </div>
                        @if (Auth::user()->id == $profile->user->id)
                            <div class="col-1">
                                <a href="/profiles/{{ $profile->id }}/edit?redirect=/profiles/{{ $profile->id }}"><img src="/images/edit.png" width="16px"></a>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        <p>{{ $profile->bio }}</p>
                    </div>
                    <div class="row">
                        <span><strong>Birthdate:</strong> {{ date('F j, Y', strtotime($profile->birthdate)) }}</span>
                    </div>
                </div>
            </div>

            <hr class="mt-5">

            @foreach ($jokes as $joke)
            <div class="card border-secondary bg-transparent m-5 text-white">
                <div class="card-body">
                    <div class="card-title fw-bold">
                        <div class="row">
                            <div class="col-sm">
                                <img src="{{ $profile->imagePath }}" class="img-circle width-32" width="32px" height="32px">
                                <a href="#" class="text-decoration-none">{{ $joke->user->name }}</a>
                            </div>
                            @if (Auth::user()->id == $profile->user->id)
                                <div class="col-1">
                                    <a href="/jokes/{{ $joke->id }}/edit?redirect=/profiles/{{ $profile->id }}"><img src="/images/edit.png" width="16px"></a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-text">
                        {!! str_replace("\r\n", "<br>", $joke->content); !!}
                    </div>
                </div>
                <div class="card-footer text-secondary border-secondary">
                    <div class="row ">
                        <div class="col-sm">
                            <upvote-button
                                style="display: inline"
                                joke_id="{{$joke->id}}"
                                count="{{ $joke->votes()->where('type', '1')->count() }}"
                                up="{{ $joke->votes()->where('user_id', auth()->user()->id)->where('type', '1')->count() != 0 }}">
                            </upvote-button>
                            <downvote-button
                                style="display: inline"
                                joke_id="{{$joke->id}}"
                                count="{{ $joke->votes()->where('type', '0')->count() }}"
                                down="{{ $joke->votes()->where('user_id', auth()->user()->id)->where('type', '0')->count() != 0 }}">
                            </downvote-button>
                        </div>
                        <div class="col-md text-end">
                            {{ date_format($joke->created_at, "M j Y g:iA") }}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="row">
                <div class="col-12 mx-5">
                    {{ $jokes->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
