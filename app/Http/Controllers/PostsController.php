<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    //this will send the browser user to the login page if she/he tried to navigate to the /p/create url without being signed in!
    public function __construct(){
        $this->middleware('auth');
    }

    //display all the posts of the people that we are following in chronological order (most recent at the top)
    public function index(){
        //grab all of the users that we are following
        //have to put 'profiles.user_id' because user also has .user_id
        $users = auth()->user()->following()->pluck('profiles.user_id');

        //latest sorts the array where most recent Post is on top based off of the timestamp when it was created
        //with('user') loads the User relationship with the Post
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->paginate(4);

        return view('posts.index', compact('posts'));

    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        //store locally in the public/uploads folder
        $imagePath = request('image')->store('uploads', 'public');

        //wrap an image file around the intervention class so that we can start to manipulate it
        //fit() resizes the image
        $image = Image::make(public_path("storage/${imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function show(\App\Post $post){
        return view('posts.show', compact('post'));
    }
}
