<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Joke;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profile.index', compact('profiles'));
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $jokes = Joke::select()->where('user_id', $profile->user->id)->paginate();

        return view('profile.show', compact('profile', 'jokes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Profile $profile)
    {
        $redirect = $request->query('redirect');
        return view("profile.edit", compact('profile', 'redirect'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'picture' => 'image',
            'name' => 'required|max:255',
            'bio' => 'max:512',
            'date' => 'date'
        ]);

        // TODO image upload
        $imagePath = $request->file('pic');
        // dd($imagePath);
        if($imagePath == null)
        {
            $imagePath = "/images/default_pic.png";
        }
        else
        {
            $imagePath = str_replace('public', '/storage', $imagePath->storeAs('public/uploads/pictures', date('m-d-Y_H:i:s', time())."_".$profile->user->id));
        }

        $profile->user->update([
            'name' => $request->input('name')
        ]);

        $profile->imagePath = $imagePath;
        $profile->bio = $request->input('bio');
        $profile->birthdate = $request->input('birthdate');
        $profile->save();

        // $profile->update([
        //     'imagePath' => "/images/default_pic.png",
        //     'bio' => $request->input('bio'),
        //     'birthdate' => $request->input('birthdate') ?? $profile->birthdate
        // ]);

        $redirect = $request->query('redirect') ?? '/';
        return redirect($redirect);
    }
}
