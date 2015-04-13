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
        <input type="text" name="title" class="form-control" required="required" value="{{ $problem->title }}">
        <input type="text" name="timelimit" class="form-control" required="required" value="{{ $problem->timelimit }}">
        <input type="text" name="memorylimit" class="form-control" required="required" value="{{ $problem->memorylimit }}">
        <br>
        <textarea name="content" rows="10" class="form-control" required="required">{{ $problem->content }}</textarea>
        <br>
        <br>
        <textarea name="inputcase" rows="10" class="form-control" required="required">{{ $problem->inputcase }}</textarea>
        <br>
        <br>
        <textarea name="outputcase" rows="10" class="form-control" required="required">{{ $problem->outputcase }}</textarea>
        <br>
        <a href="{{URL('problems/index')}}">Cancel</a>
        <button class="btn btn-lg btn-info">Save</button>
    </form>
@stop
