@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/svg/148354.jpg" class="rounded-circle w-100">
        </div>
        <div class="col-9 pt-5 pl-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-baseline pb-2">
                    <h1 class="pr-3">{{ $user->username }}</h1>

                   <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                <div>
                   @can('update', $user->profile)
                       <a href="/p/create" class="btn btn-primary">Add new Post</a>                @endcan

                   @can('update', $user->profile)
                       <a href="/profile/{{ $user->id }}/edit" class="btn btn-primary" >Edit Profile</a>
                   @endcan
               </div>

            </div>
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $postsCount }} </strong> Posts</div>
                <div class="pr-5"><strong>{{ $followersCount }} </strong> Followers</div>
                <div class="pr-5"><strong>{{ $followingCount }} </strong> Following</div>
            </div>

            <div class="pt-5">
                <div>{{ $user->profile->title }}</div>
                <div><strong>{{ $user->profile->description }}</strong></div>
                <div> <a href="#"> {{ $user->profile->url}} </a> </div>
            </div>
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
    </div>
</div>
@endsection
