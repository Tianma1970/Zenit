@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add a course</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                                {{--  @include('partials/validation_errors')
                                @include('partials/status')  --}}
                            </div>
                            <form method="POST" action="/courses" class="col-8">
                            @csrf

                            <!--Program-->

                                <div class="form-group">
                                    <label for="program_id">Program</label>
                                    <select id="program_id" name="program_id"                                 class="form-control">
                                        <option value="">Please select a program</option>
                                        @foreach($programs as $program)
                                        <option value="{{ $program->id }}"
                                        @if($program->id == old('program_id'))
                                        selected
                                        @endif
                                        >
                                        {{ $program->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    </div>

                                    <!--Title-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title"
                                                  name="title" value="{{ old('title') }}"
                                                  placeholder="Course Title"
                                                  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="points">Points</label>
                                                <input type="text" id="points"
                                                  name="points" value="{{ old('title') }}"
                                                  placeholder="YH poäng"
                                                  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Content-->

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea id="content" name="content"
                                         class="form-control" placeholder="Course description">{{ old                     ('content') }}</textarea>
                                    </div>

                                    <!--Submit-->
                                    <div class="form-group">
                                        <input type="submit" value="Save Course"
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
