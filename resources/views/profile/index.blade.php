@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-white px-5">
            <ul class="list-group bg-transparent mx-5 p-3">
            @foreach ($profiles as $profile)
                <li class="list-group-item  bg-transparent border-secondary"><div class="row d-flex">
                    <div class="row justify-content-center">
                        <div class="col-xxl-2 ps-5">
                            <a href="profiles/{{ $profile->id }}">
                                <img src="{{ $profile->imagePath }}" width="60px" height="60px">
                            </a>
                        </div>
                        <div class="col-6 text-white">
                            <div class="row">
                                <a href="profiles/{{ $profile->id }}" class="text-decoration-none h4 align-text-top">{{ $profile->user->name }}</a>
                            </div>
                                {{ $profile->user->email }}
                        </div>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
