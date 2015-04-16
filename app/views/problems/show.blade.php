@extends('_layouts.default')

@section('main')
    <div id="onepage">
        <div class="control-group">
            <h2>Problem ID</h2>
            <div class="controls">
             {{$problem->id}}
            </div>
        </div>
        <div class="control-group">
            <h2>Problem Title</h2>
            <div class="controls">
                {{ $problem->title }}
            </div>
        </div>
        <div class="control-group">
            <h2>Content</h2>
            <div class="controls">
           {{$problem->content}}
            </div>
        </div>
        <div class="control-group">
            <h2>Input Case</h2>
            <div class="controls">
                {{ $problem->inputcase }}
            </div>
        </div>
        <div class="control-group">
            <h2>Output Case</h2>
            <div class="controls">
            {{ $problem->outputcase }}
            </div>
        </div>
        <div class="control-group">
            <h2>Time Limit</h2>
            <div class="controls">
            {{ $problem->timelimit }}
            </div>
        </div>
        <div class="control-group">
            <h2> Memory Limit</h2>
            <div class="controls">
                {{ $problem->memorylimit }}
            </div>
        </div>
    </div>
    <a href="{{URL('codes/create',$problem->id)}}" class="btn btn-primary">Submit</a>
    <a href="{{URL('/')}}" class="btn btn-primary">Return</a>

@stop