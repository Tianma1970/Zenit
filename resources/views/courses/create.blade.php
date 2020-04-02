@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add a course</div>
                @include('partials/error')
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                            </div>
                            <form method="POST" action="/courses" class="col-8">
                            @csrf

                            <!--Program-->

                                <div class="form-group">
                                    <label for="program_id">{{__('Program')}}</label>
                                    <select id="program_id" name="program_id" class="form-control">
                                        <option value="">{{__('Please select a program')}}</option>
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

                                    <!--Title-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">{{__('Title')}}</label>
                                                <input type="text" id="title"
                                                  name="title" value="{{ old('title') }}"
                                                  placeholder="Titel"
                                                  class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="points">{{__('Points')}}</label>
                                                <input type="text" id="points"
                                                  name="points" value="{{ old('title') }}"
                                                  placeholder="YH poäng"
                                                  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Goal-->
                                        <div class="form-group">
                                            <label for="goal">{{__('Goal')}}</label>
                                            <textarea id="goal" name="goal"
                                            class="form-control" placeholder="Syfte och mål">{{ old('goal') }}</textarea>
                                        </div>

                                    <!--Content-->

                                    <div class="form-group">
                                        <label for="content">{{__('Content')}}</label>
                                        <textarea id="content" name="content"
                                         class="form-control" placeholder="Kursbeskrivning">{{ old('content') }}</textarea>
                                    </div>

                                    <!--Knowledge-->
                                        <div class="form-group">
                                            <label for="knowledge">{{__('Knowledge')}}</label>
                                            <textarea id="knowledge" name="knowledge"
                                             class="form-control" placeholder="Kunskaper (optional)">{{ old('knowledge') }}</textarea>
                                        </div>

                                    <!--Skills-->
                                        <div class="form-group">
                                            <label for="skills">{{__('Skills')}}</label>
                                            <textarea id="skills" name="skills"
                                             class="form-control" placeholder="Färdigheter">{{ old('skills') }}</textarea>
                                        </div>

                                    <!--Competence-->
                                        <div class="form-group">
                                            <label for="competence">{{__('Competence')}}</label>
                                            <textarea id="competence" name="competence"
                                             class="form-control" placeholder="Kompetenser (optional)">{{ old('competence') }}</textarea>
                                        </div>

                                    <!--Forms-->
                                        <div class="form-group">
                                            <label for="forms">{{__('Forms')}}</label>
                                            <textarea id="forms" name="forms"
                                             class="form-control" placeholder="Betygskriterier (optional)">{{ old('forms') }}</textarea>
                                        </div>

                                    <!Literature-->
                                        <div class="form-group">
                                            <label for="literature">{{__('Literature')}}</label>
                                            <textarea id="literature" name="literature"
                                             class="form-control" placeholder="Rekommenderad litteratur och dokumentation">{{ old('literature') }}</textarea>
                                        </div>

                                    <!--Submit-->
                                    <div class="form-group">
                                        <input type="submit" value="Save Course"
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
