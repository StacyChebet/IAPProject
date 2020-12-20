@extends('layouts.app')

@section('content')
    <div class="container">

        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h2>Edit Profile</h2>
                    </div>

                    <div class="form-group row">
                        <label for="Title" class="col-md-4 col-form-label ">{{ __('Title') }}</label>


                        <input id="Title" type="text" class="form-control @error('Title') is-invalid @enderror"
                               name="Title" value="{{ old('Title') ?? $user->profile->title}}"
                               required autocomplete="Title" autofocus>

                        @error('Title')
                        class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="Description" class="col-md-4 col-form-label ">{{ __('Description') }}</label>


                        <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror"
                               name="Description" value="{{ old('Description') ?? $user->profile->description}}"
                               required autocomplete="Description" autofocus>

                        @error('Description')
                        class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group row">
                        <label for="URL" class="col-md-4 col-form-label ">{{ __('URL') }}</label>


                        <input id="URL" type="text" class="form-control @error('URL') is-invalid @enderror"
                               name="URL" value="{{ old('URL') ?? $user->profile->url}}"
                               required autocomplete="URL" autofocus>

                        @error('URL')
                        class="invalid-feedback" role="alert"
                        <strong>{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label ">{{ __('Profile Image') }}</label>

                        <input type="file" class="form-control-file" id="image" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row pt-4">
                        <button class="btn btn-primary">Save Profile</button>
                    </div>

                </div>
            </div>
        </form>
    </div>
@endsection
