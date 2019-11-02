<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use App\User;
use Intervention\Image\Facades\Image;


class ProfilesController extends Controller
{
    public function index(User $user)
    { 
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        // This is how we would calculate the postCount without caching
        // $postCount = $user->posts->count();

        //This is how we would write the postCount with caching
        $postCount = Cache::remember('count.posts.' . $user->id, 
            //store the cache to last 30 seconds from it's creation
            //you can check the cache with Laravel telescope
            now()-> addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
        });
        
        $followersCount = $user->profile->followers->count();
        $followingCount = $user->following->count();
        
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user){
        
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user){

        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();
            //this will override $data
            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            //if imageArray is not set then default to an empty array
            //an empty array will not override anything in our data
            $imageArray ?? []
        ));
        return redirect("/profile/{$user->id}"); 

    }
}
