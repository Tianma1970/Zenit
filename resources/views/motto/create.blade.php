@extends('layouts/app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Create your Motto')}}</div>
                @include('partials/error')
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">
                                <form method="POST" action="/motto">
                                    @csrf
                                    <div class="form-group">
                                        <label for="motto">{{__('Your Motto')}}</label>
                                        <input type="textarea" id="content" name="content" required value="{{ old('motto') }}" placeholder="Motto" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <input type="submit" value="Create Motto" class="btn btn-success">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
