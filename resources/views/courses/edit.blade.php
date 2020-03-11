@extends('layouts/app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit {{ $course->title }}</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                            </div>
                            <form method="POST" action="/courses/{{ $course->id }}" class="col-8">
                            @csrf
                            @method('PUT')

                                <div class="form-group">

                                    <!--Title-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title"
                                                  name="title" required value="{{ old('title') ? old('title') : $course->title }}"
                                                  placeholder="Course Title"
                                                  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="points">Points</label>
                                                <input type="text" id="points"
                                                  name="points" required value="{{ old('points') ? old('points') : $course->points }}"
                                                  placeholder="YH poäng"
                                                  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Content-->

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea id="content" name="content"
                                         class="form-control" required value="{{ old('content') ? old('content') : $course->content }}"placeholder="Course description">{{ old                     ('content') }}</textarea>
                                    </div>

                                    <!--Submit-->
                                    <div class="form-group">
                                        <input type="submit" value="Edit Course"
                                        class="btn btn-success">
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
