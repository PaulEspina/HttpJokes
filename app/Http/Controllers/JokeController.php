<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('joke.create');
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
            'user_id' => 'required|max:32',
            'content' => 'required|max:512'
        ]);

        $joke = Joke::create([
            'user_id' => $request->input('user_id'),
            'content' => $request->input('content')
        ]);

        return redirect('jokes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function show(Joke $joke)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function edit(Joke $joke)
    {
        return "edit";
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
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joke  $joke
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joke $joke)
    {
        return "destroy";
    }
}
