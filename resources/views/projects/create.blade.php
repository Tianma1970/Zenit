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
                                <!-- Courses -->
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

                                <!--Project Author-->
                                <div class="form-group">
                                <label for="title">{{__('Author')}}</label>
                                <input type="textarea" name="author" class="form-control" placeholder="author" cols="75">
                                </div>

                                <!--Project Title-->
                                <div class="form-group">
                                <label for="title">{{__('Title')}}</label>
                                <input type="textarea" name="title" class="form-control" placeholder="title" cols="75">
                                </div>

                                <!--Project Content-->
                                <div class="form-group">
                                <label for="content">{{__('Content')}}</label>
                                <textarea id="content" name="content" class="form-control" placeholder="Content" cols="75"></textarea>
                                </div>

                                <!--Submit-->
                                <div class="row justify-content-around">
                                    <div>
                                        <input type="submit" value="Upload" class="btn btn-success">
                                    </div>
                                    <a href="/home" class="btn btn-info">{{ __('Back') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Upload a file')}}</div>
                    <div class="card-body">

                        <div class="jumbotron">

                            <!-- Message -->
                            @if(Session::has('message'))
                            <p >{{ Session::get('message') }}</p>
                            @endif

                            <!-- Form -->
                            <form method="post" action="/FileUpload/" enctype='multipart/form-data' >
                            @csrf
                            <!-- Courses -->
                                <div class="form-group">
                                    <input type="hidden" name="id" value="{{ isset($var->id) ? $var->id : null }}"
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
                            <input type='file' name='projectfiles' >
                            <input type='submit' name='submit' value='FileUpload'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
