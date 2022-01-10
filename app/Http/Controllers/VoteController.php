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

    public function up(Request $request)
    {
        $request->validate([
            'joke_id' => 'required',
        ]);

        $vote = Vote::where('joke_id', $request->input('joke_id'))
                ->where('user_id', auth()->user()->id)
                ->first();

        if($vote == null)
        {
            Vote::create([
                'user_id' => auth()->user()->id,
                'joke_id' => $request->input('joke_id'),
                'type' => '1'
            ]);
        }
        else
        {
            if($vote->type == 0)
            {
                $vote->update([
                    'type' => '1'
                ]);
            }
            else
            {
            $vote->delete();
            }
        }

        $upCount = Vote::where('joke_id', $request->input('joke_id'))->where('type', '1')->get()->count();
        $downCount = Vote::where('joke_id', $request->input('joke_id'))->where('type', '0')->get()->count();

        return ['upCount' => $upCount, 'downCount' => $downCount];
    }

    public function down(Request $request)
    {
        $request->validate([
            'joke_id' => 'required',
        ]);

        $vote = Vote::where('joke_id', $request->input('joke_id'))
                ->where('user_id', auth()->user()->id)
                ->first();

        if($vote == null)
        {
            Vote::create([
                'user_id' => auth()->user()->id,
                'joke_id' => $request->input('joke_id'),
                'type' => '0'
            ]);
        }
        else
        {
            if($vote->type == 1)
            {
                $vote->update([
                    'type' => '0'
                ]);
            }
            else
            {
            $vote->delete();
            }
        }

        $upCount = Vote::where('joke_id', $request->input('joke_id'))->where('type', '1')->get()->count();
        $downCount = Vote::where('joke_id', $request->input('joke_id'))->where('type', '0')->get()->count();

        return ['upCount' => $upCount, 'downCount' => $downCount];
    }
}
