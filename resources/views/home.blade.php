@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-8 text-white">

            <form action="/jokes" method="POST">
                @csrf
                <div class="card border-secondary bg-transparent mx-5 text-white">
                    <div class="card-body">
                        <label for="jokecontent"><h3>Got something funny?</h5></label>
                        <textarea
                            id="jokecontent"
                            name="content"
                            class="form-control bg-transparent text-white border-secondary mb-3"
                            rows="5"
                            placeholder="Make the internet laugh..."
                            ></textarea>
                        <input class="btn btn-primary" type="submit" value="Joke">
                    </div>
                </div>
            </form>

            <hr class="mt-5">

            @foreach ($jokes as $joke)
            <div class="card border-secondary bg-transparent m-5 text-white">
                <div class="card-body">
                    <div class="card-title fw-bold">
                        <img src="{{ $joke->user->profile->imagePath }}" class="img-circle" width="32px" height="32px">
                        <a href="/profiles/{{ $joke->user->profile->id }}" class="text-decoration-none">{{ $joke->user->name }}</a>
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
