@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">{{__('Add a comment to projects of') }} {{ Auth::user()->program->name }}</div>
                @include('partials/error')
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                            </div>

                            {{--  @include('partials/validation_errors')
                            @include('partials/status')  --}}

                            <form method="POST" action="/comments/store" class="col-6">
                            @csrf

                            <!--Content-->

                            <div class="form-group">
                                <label for="post_id">{{__('Project')}}</label>
                                <select id="project_id" name="project_id"
                                class="form-control">
                                <option value="">{{__('Select the project you want to comment')}}</option>
                                @foreach(Auth::user()->program->projects as $project)
                                <option value="{{ $project->id }}"
                                @if($project->id == old('project_id'))
                                selected
                                @endif
                                >
                                    {{ $project->title }} {{__('created by')}}
                                    {{ $project->author }}
                                </option>
                                @endforeach
                                </select>
                            </div>

                            <!--Author-->
                            <div class="form-group">
                                <label for="author">{{__('Your Name')}}</label>
                                <input type="author" id="author"
                                    name="author" value="{{ old('author') }}"
                                    placeholder="Your Name"
                                    class="form-control">
                            </div>


                            <!--Content-->
                            <div class="form-group">
                                <label for="content">{{__('Content')}}</label>
                                <textarea id="content" name="content"
                                class="form-control" placeholder="Your Comment">{{ old('content') }}</textarea>
                            </div>

                            <!--Status-->
                            <div class="form-group">
                                <label for="status">{{__('Status')}}</label>
                                <input type="status" id="status"
                                name="status" value="{{ old('status') }}"
                                placeholder="status"
                                class="form-control">
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
