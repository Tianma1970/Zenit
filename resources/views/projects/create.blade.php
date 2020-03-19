@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lämna in ditt projekt</div>
                    <div class="card-body">
                        @include('partials/status')
                        <div class="jumbotron">
                            <form method='post' action='/projects'>
                                @csrf
                                <!-- Courses -->
                                <div class="form-group">
                                    <label for="course_id">Course</label>
                                    <select id="course_id" name="course_id" class="form-control">
                                        <option value="">Please select a course</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}"
                                        @if($course->id == old('course_id'))
                                        selected
                                        @endif
                                        >{{ $course->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!--Project Content-->
                                <div class="form-group">
                                <label for="content">Content</label>
                                <textarea id="content" name="content" class="form-control" placeholder="Content" cols="75"></textarea>
                                </div>

                                <!--Submit-->
                                <div>
                                    <input type="submit" value="Lämna in" class="btn btn-success">
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
