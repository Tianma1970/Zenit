@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                {{-- <div class="card-header text-center">Add a comment to projects of {{ Auth::user()->program->name }}</div> --}}
                @include('partials/error')
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                            </div>

                            {{--  @include('partials/validation_errors')
                            @include('partials/status')  --}}

                            <form method="POST" action="/project/" class="col-6">
                            @csrf
                            @method('PUT')

                            <!--Content-->

                            <div class="form-group">
                                <label for="post_id">Project</label>
                                <select id="project_id" name="project_id"
                                class="form-control">
                                <option value="">Select the project you want to comment</option>
                                @foreach(Auth::user()->program->projects as $project)
                                <option value="{{ $project->id }}"
                                @if($project->id == old('project_id'))
                                selected
                                @endif
                                >
                                    {{ $project->title }} created by
                                    {{ $project->author }}
                                </option>
                                @endforeach
                                </select>
                            </div>

                            <!--Content-->
                            <div class="form-group">
                                <label for="comments">Comment</label>
                                <textarea id="comments" name="comments"
                                class="form-control" placeholder="Your Comment"></textarea>
                            </div>

                            <!--Submit-->
                            <div class="form-group">
                                <input type="submit" value="Add New Comment"
                                class="btn btn-primary">
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
