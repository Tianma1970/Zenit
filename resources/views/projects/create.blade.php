@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lämna in ditt projekt</div>
                    <div class="card-body">
                        {{-- @include('partials/status') --}}
                        <div class="jumbotron">

                            <!-- Message -->
                            @if(Session::has('message'))
                            <p >{{ Session::get('message') }}</p>
                            @endif

                            <!-- Form -->
                            <form method='post' action='/store' enctype='multipart/form-data' >
                            {{ csrf_field() }}
                            <input type='file' name='image' >
                            <input type='submit' name='submit' value='Upload File'>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
