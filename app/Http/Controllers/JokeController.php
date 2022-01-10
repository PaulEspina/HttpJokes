<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jokes = Joke::all();
        return view('joke.index', compact('jokes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|max:512'
        ]);

        Joke::create([
            'user_id' => auth()->user()->id,
            'content' => strip_tags($request->input('content'))
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function show(Joke $joke)
    {
        return view('joke.show', compact('joke'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function edit(Joke $joke, Request $request)
    {
        $redirect = $request->query('redirect');
        return view("joke.edit", compact('joke', 'redirect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joke $joke)
    {
        $request->validate([
            'content' => 'required|max:512'
        ]);

        $joke->update([
            'content' => $request->input('content')
        ]);

        $redirect = $request->query('redirect') ?? '/';
        return redirect($redirect);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joke $joke)
    {
        $joke->delete();
        return redirect('/');
    }
}
