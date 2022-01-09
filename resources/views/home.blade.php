@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 text-white">

            <div class="card border-secondary bg-transparent mx-5 text-white">
                <div class="card-body">
                    <label for="jokecontent"><h3>Got something funny?</h5></label>
                    <textarea id="jokecontent" class="form-control bg-transparent text-white border-secondary mb-3" rows="5"></textarea>
                    <input class="btn btn-primary" type="submit" value="Joke">
                </div>
            </div>
            
            <hr class="mt-5">

            <div class="card border-secondary bg-transparent mx-5 text-white">
                <div class="card-body">
                    <div class="card-title fw-bold">
                        <img src="https://cdn.pixabay.com/photo/2016/11/08/15/21/user-1808597_960_720.png" class="img-circle width-32" width="32px" height="32px">
                        <a href="#" class="text-decoration-none">@paul</a>
                    </div>
                    <div class="card-text">
                        If you donate one kidney, everybody loves you and you're a total hero. But donate five and suddenly everyone is yelling.
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
                            Dec 2 2021 7:23 AM
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
