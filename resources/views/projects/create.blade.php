@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Upload your project')}}</div>
                    <div class="card-body">
                        @include('partials/status')
                        <div class="jumbotron">
                            <form method='post' action='/project'>
                                @csrf
                                <!--select course-->
                                <div class="form-group">
                                    <label for="course_id">{{__('Course')}}</label>
                                    <select id="course_id" name="course_id" class="form-control">
                                        <option value="">{{__('Please select a course')}}</option>
                                        @foreach(Auth::user()->program->courses as $course)
                                        <option value="{{ $course->id }}"
                                        @if($course->id == old('course_id'))
                                        selected
                                        @endif
                                        >{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <!--/select course-->

                                <!--Project Author-->
                                <div class="form-group">
                                <label for="title">{{__('Author')}}</label>
                                <input type="textarea" name="author" class="form-control" placeholder="author" cols="75">
                                </div>
                                <!--/Project Author-->

                                <!--Project Title-->
                                <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="textarea" name="title" class="form-control" placeholder="title" cols="75">
                                </div>
                                <!--/Project Title-->

                                <!--Project Content-->
                                <div class="form-group">
                                <label for="content">{{__('Content')}}</label>
                                <textarea id="content" name="content" class="form-control" placeholder="Content" cols="75"></textarea>
                                </div>
                                <!--/Project Content-->

                                <!--Submit-->
                                <div class="row justify-content-around">
                                    <div>
                                        <input type="submit" value="Upload" class="btn btn-success">
                                    </div>
                                    <a href="/home" class="btn btn-info">{{ __('Back') }}</a>
                                </div>
                                <!--/Submit-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
