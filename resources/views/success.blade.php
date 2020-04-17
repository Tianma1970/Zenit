@extends('layouts/app')

@section('content')

<div class="row justify-content-center">
    <div class="jumbotron col-8">
        <h4 class="display-4">{{ __('Finished Courses') }}</h4>
        <ol>
        @foreach(Auth::user()->projects as $project)
            @if($project->comments)
                @if($project->completed === 1)

                    <li>{{ $project->course->title }}</li>

                @endif
            @endif
        @endforeach
        </ol>
        <a href="/home" class="btn btn-info">{{ __('Back')}}</a>
    </div>
</div>
@endsection
