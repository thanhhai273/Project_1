@extends('layouts.sidebar')

@section('content')

        <h2 class="mb-4"><i class="bi bi-file-earmark-break">Your Page</i></h2>

        <form action="{{ route('editPage') }}" enctype="multipart/form-data" method="post">
          @csrf
          <div class="form-group col-lg-8">
            <label>Logo</label>
            <input type="file" class="form-control-file" name="image">
          </div>
          @foreach($pages as $page)
          <div class="form-group col-lg-8">
            <label>page name</label>
            <input type="text" class="form-control" name="pageName" value="{{ $page->page ?? '' }}">
          </div>
          <div class="form-group col-lg-8">
            <label>description</label>
            <textarea class="form-control" name="pageDescription" rows="3">{{ $page->description ?? '' }}</textarea>
          </div>
          @endforeach
          <button type="submit" class="mt-3 ml-3 btn btn-info">Submit</button>
        </form>

@endsection
