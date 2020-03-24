@extends('layouts/app')

@section('content')

<div class="container">
        <h1>Write a comment</h1>

        {{--  @include('partials/validation_errors')
        @include('partials/status')  --}}

        <form method="POST" action="/comments/store" class="col-6">
            @csrf

            <!--Content-->

            <div class="form-group">
                <label for="post_id">Project</label>
                <select id="project_id" name="project_id"
                class="form-control">
                <option value="">Select the project you want to comment</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}"
                        @if($project->id == old('project_id'))
                            selected
                            @endif
                            >
                                {{ $project->title }}
                        </option>
                @endforeach


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
