@extends('layouts/app')

@section('content')

<h3>Finished Courses</h3>
<ol>
@foreach(Auth::user()->projects as $project)
        {{-- @if($project->completed === 1) --}}
        <li>{{ $project->title }}</li>
        {{-- @endif --}}

@endforeach
</ol>

@endsection
