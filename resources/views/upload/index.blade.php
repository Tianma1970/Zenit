@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Upload your profile Picture')}}</div>
                    <div class="card-body">
                        <div class="jumbotron">

                            <!-- Message -->
                            @if(Session::has('message'))
                            <p >{{ Session::get('message') }}</p>
                            @endif
                            <!--/Message-->

                            <!-- Form -->
                            <form method='post' action='/store' enctype='multipart/form-data' >
                            @csrf
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
