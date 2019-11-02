@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row">
       <div class="col-3 p-5">
            <img class="rounded-circle w-100" src="{{ $user->profile->profileImage() }}" alt="">
       </div>
       <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline ">
                <div class="d-flex align-items-center pb-4">
                    <div class="h4">{{ $user->username }}</div>
                    <!-- Vue Follow Button -->
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"/>
                </div>
                
                @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
                @endcan
            </div>

            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
            @endcan


            <div class="d-flex">  
                <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <!-- <div>{{ $user->posts }}</div> -->
            <div><a href="#" target="_blank" rel="noopener noreferrer">{{ $user->profile->url }}</a></div>
       </div>
   </div>

   <div class="row pt-5">
   @foreach($user->posts as $post)
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id }}">
                <img class="w-100" src="/storage/{{ $post->image }}">
            </a>
        </div>
   @endforeach
       <!-- <div class="col-4"><img class="w-100"src="https://instagram.fbkk5-4.fna.fbcdn.net/vp/7fae7ab24f5ae2380abbbdd22e88d003/5E60A8E5/t51.2885-15/sh0.08/e35/c0.108.1440.1440a/s640x640/75266943_172640417127046_8922705727225766606_n.jpg?_nc_ht=instagram.fbkk5-4.fna.fbcdn.net&_nc_cat=110" alt=""></div>
       <div class="col-4"><img class="w-100"src="https://instagram.fbkk5-7.fna.fbcdn.net/vp/db6905b43da06ab80ad9a6207b7b826b/5E444480/t51.2885-15/sh0.08/e35/c0.115.933.933a/s640x640/73319948_3118988548118480_2584593794372883946_n.jpg?_nc_ht=instagram.fbkk5-7.fna.fbcdn.net&_nc_cat=108" alt=""></div>
       <div class="col-4"><img class="w-100"src="https://instagram.fbkk5-3.fna.fbcdn.net/vp/aac9a27be28b3d6996fd210546486edc/5E623A2F/t51.2885-15/sh0.08/e35/c2.0.745.745a/s640x640/73174649_2404377109881299_3305170173981020096_n.jpg?_nc_ht=instagram.fbkk5-3.fna.fbcdn.net&_nc_cat=111" alt=""></div> -->
   </div>
   
</div>
@endsection
