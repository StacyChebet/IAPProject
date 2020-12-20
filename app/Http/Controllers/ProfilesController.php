<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        $postsCount =  Cache::remember(
            'count.posts.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
            return $user->posts->count();
        });

        $followersCount =  Cache::remember(
            'count.followers.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->profile->followers->count();
            });

        $followingCount =  Cache::remember(
            'count.following.'. $user->id,
            now()->addSeconds(30),
            function () use ($user){
                return $user->following->count();
            });

        return view('profiles.index', compact('user', 'follows', 'postsCount', 'followersCount' ,'followingCount'));
    }

    public function edit(\App\Models\User $user)
    {

        $this->authorize('update', $user->profile);
        return view('profiles.edit', compact('user'));

    }

    public function update(User $user)
    {
        $data = request()->validate([
            'Title' => '',
            'Description' => '',
            'URL' => '',
            'image' => '',
        ]);

        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
