@extends('layouts.sidebar')

@section('content')

        <h2 class="mb-4"><i class="bi bi-link-45deg"> Links</i></h2>

        <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Link</th>
            <th scope="col">Click</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>
        <tbody>
        @foreach($links as $link)
          <tr>
            <td > {{$link->title}}</td>
            <td><a href="{{ $link->link }}">{{ $link->link }}</a></td>
            <td>{{ $link->click_number }}</td>
            <td><a href="/links/{{ $link->id }}">Edit</a></td>
            <td><a href="/links/delete/{{ $link->id }}" class="text-danger">Delete</a></td>
          </tr>
        @endforeach
        </tbody>
        </table>

            <ul class="pagination justify-content-center">
                  {!! $links ?? ''->links() !!}
            </ul>

@endsection
