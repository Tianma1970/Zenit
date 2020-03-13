@extends('layouts/app')

@section('content')

    <div class="container">
        <h1>Add some News</h1>

        @include('partials/error')
        <form method="POST" action="/news" class="col-6">
            @csrf
            <div class="form-group">
                <label for="title">Titel</label>
                <input type="title" id="title"
                  name="title" required value="{{ old('title') }}"
                  placeholder="Title"
                  class="form-control">
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="author" id="author"
                  name="author" required value="{{ old('author') }}"
                  placeholder="author"
                  class="form-control">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" placeholder="Content"
                  name="content" required value="{{ old('content') }}"
                  class="form-control">
                </textarea>
            </div>

            <!--Submit-->
            <div class="form-group">
                <input type="submit" value="Add News"
                class="btn btn-success">
            </div>

        </form>
    </div>

@endsection
