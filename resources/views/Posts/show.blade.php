@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-8">
                <img src="/storage/{{ $post->image }}" alt="" class="w-100">
            </div>

            <div class="col-4">
                <div>
                    <div class="align-items-center">
                        <div class="d-flex">
                            <div class="font-weight-bold ">
                                <a href="/profile/{{ $post->user->id }}">
                                        <span class="text-dark">{{ $post->user->username }}</span></a>
                                </div>
                            <a href="#" class="pl-3">Follow</a>
                        </div>

                        <hr>

                        <div class="d-flex align-items-center">
                            <p> <div class="font-weight-bold"> <a href="/profile/{{ $post->user->id }}"><span class="text-dark">{{ $post->user->username }}</span></a> </div>{{ $post->caption }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
