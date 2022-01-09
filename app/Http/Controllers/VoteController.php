<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $v = Vote::all();
        dd($v);
    }

    public function store(Request $request)
    {
        $request->validate([
            'joke_id' => 'required',
            'type' => 'required'
        ]);


        Vote::create([
            'user_id' => auth()->user()->id,
            'joke_id' => $request->input('joke_id'),
            'type' => $request->input('type')
        ]);

        return redirect($request->input('redirect') ?? '/');
    }

    public function update(Request $request, Vote $vote)
    {
        $request->validate([
            'joke_id' => 'required',
            'type' => 'required'
        ]);

        $vote->update([
            'type' => $request->input('type')
        ]);

        return redirect($request->input('redirect') ?? '/');
    }

    public function destroy(Request $request, Vote $vote)
    {
        $vote->delete();
        return redirect($request->input('redirect') ?? '/');
    }
}
