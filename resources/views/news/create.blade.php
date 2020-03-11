@extends('layouts/app')

@section('content')

    <div class="container">
        <h1>Add some News</h1>

        <form method="POST" action="/news" class="col-6">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="title" id="title"
                  name="title" value="{{ old('title') }}"
                  placeholder="Title"
                  class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <input type="text-area" id="content"
                  name="content" value="{{ old('content') }}"
                  placeholder="Content"
                  class="form-control">
            </div>

            <!--Submit-->
            <div class="form-group">
                <input type="submit" value="Add News"
                class="btn btn-success">
            </div>

        </form>
    </div>

@endsection
