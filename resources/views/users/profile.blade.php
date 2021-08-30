@extends('layouts.sidebar')

@section('content')

        <h2 class="mb-4"><i class="bi bi-person"> Profile</i></h2>

        <form  action="{{ route('editProfile') }}" method="POST">
        @csrf
        @foreach($profile as $profile)
          <div class="form-group col-lg-8">
            <label for="name">Username</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $profile->name }}">
          </div>
          <div class="form-group col-lg-8">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $profile->email }}">
          </div>
          <div class="form-group col-lg-8">
            <label for="password">Password</label>
            <br>
            <button type="button" name="password" class=" btn btn-info"><a href="/change_password" style="color:white">change password</a></button>
          </div>
          <button type="submit" class="mt-3 ml-3 btn btn-info">Submit</button>
          @endforeach
        </form>

@endsection
