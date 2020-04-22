@extends('layouts/app')

@section('content')

<div class="row justify-content-center">
    <div class="jumbotron col-8">
        <h4 class="display-6">Hi, {{ Auth::user()->name}}, {{ __('you finished these courses') }}</h4>
        <ol>
        @foreach(Auth::user()->projects as $project)
            @if($project->comments)
                @if($project->completed === 1)

            <!--Finished courses to be shown-->
                    <li>{{ $project->course->title }}</li>
            <!--/Finished courses to be shown-->
                @endif
            @endif
        @endforeach
        </ol>
        <a href="/home" class="btn btn-info">{{ __('Back')}}</a>
    </div>
</div>
@endsection
