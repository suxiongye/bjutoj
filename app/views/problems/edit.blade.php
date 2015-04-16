@extends('_layouts.default')

@section('main')

    <h2>Problem Edit</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    <form action="{{ URL('problems/update/'.$problem->id) }}" method="POST">
        <input name="_method" type="hidden" value="POST">
        <div class="control-group">
            {{ Form::label('title', 'Title') }}
            <div class="controls">
                <input type="text" name="title"  value="{{ $problem->title }}">
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('timelimit', 'TimeLimit(s)') }}
            <div class="controls">
                <input type="text" name="timelimit" value="{{ $problem->timelimit }}">
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('memorylimit', 'MemoryLimit(M)') }}
            <div class="controls">
                <input type="text" name="memorylimit" value="{{ $problem->memorylimit }}">
            </div>
        </div>

        <div class="control-group">
            {{ Form::label('body', 'Content') }}
            <div class="controls">
                <textarea name="content" rows="10" cols="100" >{{ $problem->content }}</textarea>
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('inputcase', 'InputCase') }}
            <div class="controls">
        <textarea name="inputcase" rows="10">{{ $problem->inputcase }}</textarea>
            </div>
        </div>
        <div class="control-group">
            {{ Form::label('outputcase', 'OutputCase') }}
            <div class="controls">
        <textarea name="outputcase" rows="10">{{ $problem->outputcase }}</textarea>
            </div>
        </div>
        <div class="form-actions">
        <a href="{{URL('problems/index')}}" class="btn btn-lg btn-info">Cancel</a>
            <input type="submit" class="btn btn-lg btn-info" value="Save">
        </div>
    </form>
@stop
