@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <h1>{{ $news->title }}</h1>
            </div>
            <div class="card-body">
                <p>{{ $news->content }}</p>
            </div>
            <div class="card-footer">
                <small>News created at <i>{{ $news->updated_at }}</i></small><br>
            </div>
        </div>
                @if(Auth::user()->type === 'admin')
                <div class="row justify-content-around mt-5">
                    <a href="/news/{{ $news->id}}/edit" class="btn btn-info">{{__('Edit:')}}&nbsp;{{$news->title}}</a>
                    <form method="post" action="/news/{{ $news->id }}">
                        @csrf
                        @method("DELETE")
                        <input type="submit" class="btn btn-danger" value="Delete {{$news->title }}"></input>
                    </form>
                </div>
                @endif
    </div>



@endsection
