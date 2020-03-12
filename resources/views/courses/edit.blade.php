@extends('layouts/app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit {{ $course->title }}</div>
                    <div class="card-body">
                        <div class="jumbotron">
                            <div class="card-title">

                            </div>
                            <form method="POST" action="/courses/{{ $course->id }}" class="col-8">
                            @csrf
                            @method('PUT')

                                <div class="form-group">

                                    <!--Title-->
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title"
                                                  name="title" required value="{{ old('title') ? old('title') : $course->title }}"
                                                  placeholder="Titel"
                                                  class="form-control">
                                            </div>
                                        </div>

                                        <!--Points-->

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="points">Points</label>
                                                <input type="text" id="points"
                                                  name="points" required value="{{ old('points') ? old('points') : $course->points }}"
                                                  placeholder="YH poäng"
                                                  class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <!--Goal-->
                                    <div class="form-group">
                                        <label for="goal">Goal</label>
                                        <input type="textarea" id="goal" name="goal"
                                         class="form-control" required value="{{ old('goal') ? old('goal') : $course->goal }}"placeholder="Syfte och mål">{{ old      ('goal') }}
                                    </div>

                                    <!--Content-->

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <input type="textarea" id="content" name="content"
                                         class="form-control" required value="{{ old('content') ? old('content') : $course->content }}"placeholder="Kursens innehåll">{{ old ('content') }}</textarea>
                                    </div>

                                    <!--Knowledge-->

                                    <div class="form-group">
                                        <label for="knowledge">knowledge</label>
                                        <input type="textarea" id="knowledge" name="knowledge"
                                         class="form-control" required value="{{ old('knowledge') ? old('knowledge') : $course->knowledge }}"placeholder="Kunskaper">{{ old ('knowledge') }}
                                    </div>

                                    <!--Skills-->

                                    <div class="form-group">
                                        <label for="skills">Skills</label>
                                        <input type="textarea" id="skills" name="skills"
                                         class="form-control" required value="{{ old('skills') ? old('skills') : $course->skills }}"placeholder="Färdigheter">{{ old ('skills') }}
                                    </div>

                                    <!--Competence-->

                                    <div class="form-group">
                                        <label for="competence">Competence</label>
                                        <input type="textarea" id="competence" name="competence"
                                         class="form-control" required value="{{ old('competence') ? old('competence') : $course->competence }}"placeholder="Kompetenser">{{ old ('competence') }}
                                    </div>

                                    <!--Forms-->

                                     <div class="form-group">
                                        <label for="forms">Forms</label>
                                        <input type="textarea" id="forms" name="forms"
                                         class="form-control" required value="{{ old('forms') ? old('forms') : $course->forms }}"placeholder="Betygskriterier">{{ old ('forms') }}
                                    </div>

                                    <!--Literature-->

                                     <div class="form-group">
                                        <label for="literature">Literature</label>
                                        <input type="textarea" id="literature" name="literature"
                                         class="form-control" required value="{{ old('literature') ? old('literature') : $course->literature }}"placeholder="Rekommenderad litteratur och dokumentation">{{ old ('literature') }}
                                    </div>

                                    <!--Submit-->
                                    <div class="form-group">
                                        <input type="submit" value="Edit Course"
                                        class="btn btn-success">&nbsp;
                                        <a href="/home" class="btn btn-info">Back</a>
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
