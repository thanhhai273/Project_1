@extends('layouts.sidebar')

@section('content')

        <h2 class="mb-4"><i class="bi bi-plus"> Add Link</i></h2>

        <form action="{{ route('addLink') }}" method="post">
        @csrf
        <div class="form-group col-lg-8">
        <label for="title">Title</label>
          <input type="text" id="title" name="title" class="form-control" placeholder="Google">  
        <label for="link">Link</label>
          <input type="text" id="link" name="link" class="form-control" placeholder="https://google.com">
        </div>
        <button type="submit" class="mt-3 ml-3 btn btn-info">Submit</button>
        </form>

@endsection
