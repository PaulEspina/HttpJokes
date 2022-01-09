@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-white">
            <div class="card border-secondary bg-transparent mx-5 text-white">
                <div class="card-body">
                    <div class="card-title fw-bold">
                        <img src="https://cdn.pixabay.com/photo/2016/11/08/15/21/user-1808597_960_720.png" class="img-circle width-32" width="32px" height="32px">
                        <a href="#" class="text-decoration-none">{{ $joke->user->name }}</a>
                    </div>
                    <div class="card-text">
                        {{ $joke->content }}
                    </div>
                </div>
                <div class="card-footer text-secondary border-secondary">
                    <div class="row ">
                        <div class="col">
                            <button class="btn" type="submit">
                                <img src="{{ URL::to('/') }}/testimage/upvote.png" width="16px" height="16px">
                            </button>
                            0
                        </div>
                        <div class="col text-end">
                            {{ date_format($joke->created_at, "M j Y g:iA") }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
