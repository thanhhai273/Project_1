@extends('layouts.sidebar')

@section('content')

        <h2 class="mb-4"><i class="bi bi-pen"> Edit Link</i></h2>

        <form action="/links/{{ $link->id }}" method="POST">
        @csrf
        <div class="form-group col-lg-8">
          <label for="title">Title</label>
          <input type="text" id="title" name="title" value="{{ $link->title }}" class="form-control" placeholder="Google">
        </div>
        <div class="form-group col-lg-8">
          <label for="link">Link</label>
          <input type="text" id="link" name="link" value="{{ $link->link }}" class="form-control" placeholder="https://google.com">
        </div>
        <button type="submit" class="mt-3 ml-3 btn btn-info">Submit</button>
        </form>

@endsection
