@extends('layouts.app')

@section('content')
@if(Auth::user()->type === 'superadmin')
    <a href="/programs/create" class="btn btn-info">{{ __('Create a Program') }}</a>
@else
<div class="container">
    @include('partials/status')
    <div class="row justify-content-center">

        <!--Bootstrap Akkordion-->
        <div class="col-md-4">
            <div class="card-header">{{__('Courses')}}</div>
            <div class="accordion mt-3" id="accordionExample">
            @if($courses->count() > 0)
            @foreach(Auth::user()->program->courses  as $course)
            <div class="card">
                <div class="card-header" id="courseheading{{ $course->id }}">
                    <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#course{{ $course->id }}" aria-expanded="false" aria-controls="course{{ $course->id }}">
                        {{ $course->title }}
                </button>
                </div>

                <div id="course{{ $course->id }}" class="collapse" aria-labelledby="courseheading{{ $course->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                        <a href="/courses/{{$course->id}}">{{ $course->title }}</a><br>
                        {{ $course->skills }}<br>
                        @if(Auth::user()->type === 'admin')
                        <form method="post" action="/courses/{{ $course->id }}">
                            @method("DELETE")
                            @csrf
                                <a href="/courses/{{ $course->id}}/edit" class="btn btn-info mt-3">Edit</a>
                                <input type="submit" value="Delete" class="btn btn-danger mt-3"></input>
                            </form>
                        @endif
                        <hr>
                        <small>{{ $course->points }}{{__('Points')}}</small><br>
                        @if(Auth::user()->type === 'member')
                            <a href="projects/create" class="btn btn-info mt-3">{{__('Upload your project')}}</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <!--/Bootstrap Akkordion-->

    <!--The Profile part-->
        <div class="col-md-5">
            <div class="card">
                @if(Auth::user()->program)
                <div class="card-header">{{__('Welcome:')}} {{ Auth::user()->name }},
                    {{__('you are logged in as a')}} <strong>{{ strtoupper(Auth::user()->type )}}</strong>! for {{ Auth::user()->program->name }}<br>
                </div>
                @endif
                <div class="card-body">
                    @if(Auth::user()->type === 'member')

                            <h4>Your Program is  {{ Auth::user()->program->name }}</h4><br>

                    @endif

                    @if(Auth::user()->user_image)
                        <div class="col-12 text-center">
                            <img src="/images/{{Auth::user()->user_image}}"width='150' height='150'>
                        </div>
                    @endif
                    @if(Auth::user()->motto)
                    <div class="mt-3 text-center">
                        <p>Your Motto is: {{ Auth::user()->motto }}</p>
                    </div>
                    @endif
                    Member Page: <a href="{{ url('/')}}/memberOnlyPage">{{__('Member')}}</a><br>
                    Admin Page: <a href="{{ url('/')}}/adminOnlyPage">{{__('Admin')}}</a>
                </div>
            </div>
        </div>
        <!--/The Profile part-->

        <!--The News part-->
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{__('News')}}</div>
                <div class="card-body">
                    <ul>
                        @if($news->count() > 0)
                        @foreach(Auth::user()->program->news as $news)
                        @if(Auth::user()->type === 'admin')
                        <li><h5><a href="/news/{{ $news->id }}">{{ $news->title }}</a></h5>
                        @else
                        <li><h5>{{ $news->title }}</h5>
                        @endif
                            <p>{{ $news->content }}</p></li>

                            @if($news->author)
                                <small><i>{{__('written by')}}</i> {{ $news->author }}</small>
                            @endif
                            <hr>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--The News part-->

</div>
@endif
@endsection
