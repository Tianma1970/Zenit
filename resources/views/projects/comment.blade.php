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

                            <form method="POST" action="/project/" class="col-12">
                            @csrf
                            @method('PUT')

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

                            <!--Content-->
                            <div class="form-group">
                                <label for="comments">{{__('Comment')}}</label>
                                <input id="textarea" name="comments"
                                class="form-control" required value="{{ old('comments') ? old('comments') : $project->comments }}"></textarea>
                            </div>

                            <!--Submit-->
                            <div class="row justify-content-around">
                                <input type="submit" value="Add New Comment"
                                class="btn btn-primary">
                                <a href="/middleware" class="btn btn-info">{{ __('Back') }}</a>
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
