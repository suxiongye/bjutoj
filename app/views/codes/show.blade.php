@extends('_layouts.default')

@section('main')
    <div id="onepage">
        <div class="control-group">
            <h2>Code Id</h2>
            <div class="controls">
                {{$code->id}}
            </div>
        </div>
        <div class="control-group">
            <h2>Problem Id</h2>
            <div class="controls">
                {{$code->pro_id}}
            </div>
        </div>
        <div class="control-group">
            <h2>Code Content</h2>
            <div class="controls">
                {{$code->content}}
            </div>
        </div>

        <div class="control-group">
            <h2>Code Status</h2>
            <div class="controls">
                {{$code->status}}
            </div>
        </div>
        <div class="control-group">
            <h2>Code Remarks</h2>
            <div class="controls">
                {{$code->remarks}}
            </div>
        </div>
    <a href="{{URL('codes/index')}}" class="btn btn-primary">Return</a>

@stop