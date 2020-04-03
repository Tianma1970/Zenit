@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Edit {{ $news->title }}</h3>
                </div>
                <form method="POST" action="/news/{{ $news->id }}">
                @csrf
                @method('PUT')
                    <div class="card-body">
                        <div class="jumbotron">

                        <!--Title-->
                        <div class="form-group">
                            <label for="title">{{__('Title')}}</label>
                            <input type="title" id="title"
                            name="title" required value="{{ old('title') ? old('title') : $news->title }}"
                            placeholder="Title" class="form-control">
                        </div>

                        <!--Author-->
                        <div class="form-group">
                            <label for="author">{{__('Author')}}</label>
                            <input type="author" id="author"
                            name="author" required value="{{ old('author') ? old('author') : $news->author }}"
                            placeholder="Author"
                            class="form-control">
                        </div>

                        <!--Content-->
                        <div class="form-group">
                            <label for="content">{{__('Content')}}</label>
                            <input type="text-area" id="content"
                            name="content" required value="{{ old('content') ? old('content') : $news->content }}"
                            placeholder="Content"
                            class="form-control">
                        </div>

                        <div class="row justify-content-around">
                            <!--Submit-->
                            <div class="form-group">
                                <input type="submit" value="Edit News" class="btn btn-success">
                                <a href="/home" class="btn btn-info">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
