@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>{{__('Complete ')}}&nbsp;{{$project->title}}</h3>
                </div>
                    <div class="card-body">
                        @include('partials/status')
                        <div class="jumbotron">
                            <form method="post" action="/project/{{ $project->id }}/update">
                                @csrf
                                @method('PUT')

                                <!--Project Author-->
                                <div class="form-group">
                                <label for="title">{{__('Author')}}</label>
                                <input type="textarea" required value="{{ old('author') ? old('author') : $project->author}}" name="author" class="form-control">
                                </div>
                                <!--/Project Author-->

                                <!--Project Title-->
                                <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="textarea" required value="{{old('title') ? old('title') : $project->title}}"name="title" class="form-control" >
                                </div>
                                <!--/Project Title-->

                                <!--Project Content-->
                                <div class="form-group">
                                <label for="content">{{__('Content')}}</label>
                                <input id="textarea" required value="{{old('content') ? old('content') : $project->content}}"name="content" class="form-control"></input>
                                </div>
                                <div class="row justify-content-around">
                                <!--/Project Content-->

                                <!--Buttons-->
                                <div class="row justify-content-around">
                                    <input type="submit" value="Complete" class="btn btn-success">
                                </div>
                                <a href="/middleware" class="btn btn-info">{{ __('Back') }}</a>
                                <!--/Buttons-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
