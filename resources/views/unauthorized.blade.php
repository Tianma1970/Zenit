@extends('layouts/app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Access denied</div>
                        <div class="card-body">
                            <div class="alert alert-danger">
                                <div class="card-title">

                                <div class="title m-b-md">
                                    You cannot access this page! This is for only '{{ $role }}'
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
