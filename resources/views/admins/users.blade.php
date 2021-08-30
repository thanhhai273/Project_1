@extends('layouts.sidebar')

@section('content')

        <h2 class="mb-4"><i class="bi bi-person"> Users</i></h2>

        <form action="{{ route('searchUser') }}" method="post">
        @csrf
          <div class="form-group col-lg-8 mb-5">
            <input type="text" name="name" placeholder="search user">
            <button type="submit" class="btn-primary"><i class="bi bi-search"></i></button>
          </div>
        </form>
        Users: 
        <a href="/admins/users/all">All</a> - 
        <a href="/admins/users/user">User</a> - 
        <a href="/admins/users/vip">Vip</a> - 
        <a href="/admins/users/admin">Admin</a> 

        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Edit</th>
              <th scope="col">Role</th>
              <th scope="col">Block</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td><a href="/{{ $user->name }}" target="_blank"><i class="bi bi-box-arrow-up-right"></i> {{ $user->name}} </a></td>
              <td><a href="{{ route('editUser', $user->id ) }}">Edit</a></td>
              <td>{{ $user->role }}</td>
              <td><a href="{{ route('blockUser', ['block' => $user->block, 'id' => $user->id] ) }}" class="text-danger">{{ $user->block }}</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>

@endsection
