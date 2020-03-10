@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials/status')
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Courses</div>
                <div class="card-body">
                    <ul>
                        @foreach($courses as $course)
                        <li>{{ $course->title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Welcome: {{ Auth::user()->name }}</div>

                <div class="card-body">
                    You are logged in as <strong>{{ strtoupper(Auth::user()->type )}}</strong>!<br>

                    Member Page: <a href="{{ url('/')}}/memberOnlyPage">Member</a><br>
                    Admin Page: <a href="{{ url('/')}}/adminOnlyPage">Admin</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">News</div>
                <div class="card-body">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
