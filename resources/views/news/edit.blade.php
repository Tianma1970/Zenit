@extends('layouts/app')

@section('content')

<div class="container">
        <h1>Edit: {{ $news->title }}</h1>

        <form method="POST" action="/news/{{ $news->id }}" class="col-6">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">{{__('Title')}}</label>
                <input type="title" id="title"
                  name="title" required value="{{ old('title') ? old('title') : $news->title }}"
                  placeholder="Title"
                  class="form-control">
            </div>

            <div class="form-group">
                <label for="author">{{__('Author')}}</label>
                <input type="author" id="author"
                  name="author" required value="{{ old('author') ? old('author') : $news->author }}"
                  placeholder="Author"
                  class="form-control">
            </div>

            <div class="form-group">
                <label for="content">{{__('Content')}}</label>
                <input type="text-area" id="content"
                  name="content" required value="{{ old('content') ? old('content') : $news->content }}"
                  placeholder="Content"
                  class="form-control">
            </div>

            <!--Submit-->
            <div class="form-group">
                <input type="submit" value="Edit News"
                class="btn btn-success">
            </div>

        </form>
    </div>

@endsection
