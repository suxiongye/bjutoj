@extends('_layouts.default')

@section('main')

    <h2>Problem</h2>

    <div id="">
        problem id = {{$problem->id}}
        <hr/>
        problem title
        <div class="">
            <h3>{{ $problem->title }}</h3>
        </div>
        problem content
        <div class="">
           {{$problem->content}}
        </div>
        problem input case
        <div class="body">
            {{ $problem->inputcase }}
        </div>
        problem output case
        <div class="body">
            {{ $problem->outputcase }}
        </div>
        problem timelimit = {{ $problem->timelimit }}
        problem memorylimit = {{$problem->memorylimit}}
    </div>
    <a href="#">Submit</a>
    <a href="{{URL('/')}}">Return</a>

@stop