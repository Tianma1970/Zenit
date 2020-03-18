@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add some News</div>
                @include('partials/error')
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                            </div>
                                    @include('partials/error')
                                    <form method="POST" action="/news" class="col-6">
                                        @csrf
                                    <div class="form-group">
                                        <label for="program_id">Program</label>
                                        <select id="program_id" name="program_id" class="form-control">
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
                                        <div class="form-group">
                                            <label for="title">Titel</label>
                                            <input type="title" id="title"
                                              name="title" required value="{{ old('title') }}"
                                              placeholder="Title"
                                              class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="author">Author</label>
                                            <input type="author" id="author"
                                              name="author" required value="{{ old('author') }}"
                                              placeholder="author"
                                              class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea id="content" placeholder="Content"
                                              name="content" required value="{{ old('content') }}"
                                              class="form-control">
                                            </textarea>
                                        </div>

                                        <!--Submit-->
                                        <div class="form-group">
                                            <input type="submit" value="Add News"
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
