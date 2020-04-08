@extends('layouts/app')

@section('content')


<div class="row justify-content-center">
    <div class="jumbotron col-8">
        <h4 class="display-4">{{ __('You are signed out') }}</h4>

        <hr class="my-4">

        <a class="btn btn-info btn-lg" href="/login" role="button">{{ __('Log in again') }}</a>
    </div>
</div>



@endsection
