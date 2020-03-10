@extends('layouts/app')

@section('content')

<div class="container">
        <h1>Write a comment</h1>

        {{--  @include('partials/validation_errors')
        @include('partials/status')  --}}

        <form method="POST" action="/comments" class="col-6">
            @csrf

            <!--Content-->

            <div class="form-group">
                <label for="post_id">Post</label>
                <select id="post_id" name="post_id"
                class="form-control">
                {{--  <option value="">Select the post you want to comment</option>
                @foreach($posts as $post)
                    <option value="{{ $post->id }}"
                        @if($post->id == old('post_id'))
                            selected
                            @endif
                            >
                                {{ $post->title }}
                        </option>
                @endforeach  --}}


            </select>
            <div class="form-group">
                <label for="author">Your Name</label>
                <input type="author" id="author"
                  name="author" value="{{ old('author') }}"
                  placeholder="Your Name"
                  class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Your Email</label>
                <input type="email" id="email"
                  name="email" value="{{ old('email') }}"
                  placeholder="Your E-mail"
                  class="form-control">
            </div>


                <label for="content">Content</label>
                <textarea id="content" name="content"
                 class="form-control" placeholder="Your Comment">{{ old('content') }}</textarea>
            </div>

            <!--Submit-->
            <div class="form-group">
                <input type="submit" value="Add New Comment"
                class="btn btn-primary">
            </div>

        </form>
    </div>

@endsection
