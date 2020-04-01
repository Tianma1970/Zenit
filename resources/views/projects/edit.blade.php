@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Complete your Project')}}</div>
                    <div class="card-body">
                        @include('partials/status')
                        <div class="jumbotron">
                            <form method='post' action='/projects/'>
                                @csrf
                                @method('PUT')
                                <!-- Courses -->
                                <div class="form-group">
                                    <label for="course_id">Course</label>
                                    <select id="course_id" name="course_id" class="form-control">
                                        <option value="">{{ __('Select the Project to be completted') }}</option>
                                        @foreach(Auth::user()->projects as $project)
                                        @if($project->completed === 0)
                                        <option value="{{ $project->id }}"
                                        @if($project->id == old('project_id'))
                                        selected
                                        @endif
                                        >{{ $project->title }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>

                                <!--Project Author-->
                                <div class="form-group">
                                <label for="title">Author</label>
                                <input type="textarea" name="author" class="form-control" placeholder="author" cols="75">
                                </div>

                                <!--Project Title-->
                                <div class="form-group">
                                <label for="title">Title</label>
                                <input type="textarea" name="title" class="form-control" placeholder="title" cols="75">
                                </div>

                                <!--Project Content-->
                                <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" name="content" class="form-control" placeholder="Content" cols="75"></textarea>
                                </div>

                                <!--Submit-->
                                <div>
                                    <input type="submit" value="Lämna in" class="btn btn-success">
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
