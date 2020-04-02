@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Complete Project:')}}&nbsp;{{$project->title}}</div>
                    <div class="card-body">
                        @include('partials/status')
                        <div class="jumbotron">
                            <form method="post" action="/project/{{ $project->id }}/update">
                                @csrf
                                @method('PUT')
                                {{-- <!-- Courses -->
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
                                </div> --}}

                                <!--Project Author-->
                                <div class="form-group">
                                <label for="title">{{__('Author')}}</label>
                                <input type="textarea" required value="{{ old('author') ? old('author') : $project->author}}" name="author" class="form-control">
                                </div>

                                <!--Project Title-->
                                <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="textarea" required value="{{old('title') ? old('title') : $project->title}}"name="title" class="form-control" >
                                </div>

                                <!--Project Content-->
                                <div class="form-group">
                                <label for="content">{{__('Content')}}</label>
                                <input id="textarea" required value="{{old('content') ? old('content') : $project->content}}"name="content" class="form-control"></input>
                                </div>

                                <!--Submit-->
                                <div>
                                    <input type="submit" value="Complete" class="btn btn-success">
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
