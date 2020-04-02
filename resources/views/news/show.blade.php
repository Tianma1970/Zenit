@extends('layouts/app')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-title text-center">
            <h1>{{ $news->title }}</h1>
        </div>

        <div class="card-text">
            <p>{{ $news->content }}</p>
        </div>

    </div>
    @if(Auth::user()->type === 'admin')
        <a href="/news/{{ $news->id}}/edit" class="btn btn-success">{{__('Edit:')}}&nbsp;{{$news->title}}</a>
        <form method="post" action="/news/{{ $news->id }}">
            @csrf
            @method("DELETE")
        <input type="submit" value="Delete {{$news->title }}" class="btn btn-danger mt-5"></input>
        </form>
    @endif
</div>

@endsection
