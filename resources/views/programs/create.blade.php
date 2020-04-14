@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Create a Program')}}</div>
                    <div class="card-body">
                        @include('partials/status')
                        <div class="jumbotron">
                            <form method="post" action="/programs">
                            @csrf
                            <!--Name-->
                            <div class="form-group">
                                <label for="Name">{{__('Name')}}</label>
                                <input type="name" id="name" name="name" placeholder="Namn" class="col-8" required value="{{ old('name')}}">
                            </div>
                            <div class="form-group">
                                <label for="year">{{__('Year')}}</label>
                                <input type="year" id="year" name="year" placeholder="År" class="col-8" required value="{{ old('year')}}">
                            </div>

                            <!--Submit-->
                            <div class="form-group">
                                <input type="submit" value="Save program" class="btn btn-success">
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
