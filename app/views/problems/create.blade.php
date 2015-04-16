@extends('_layouts.default')

@section('main')

    <h2>Problem Create</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    <form action="{{ URL('problems/store') }}" method="POST">
        <input name="_method" type="hidden" value="POST">
        <label>Title</label>
        <input type="text" name="title" class="form-control" >
        <label>Time Limit(s)</label>
        <input type="text" name="timelimit" class="form-control" >
        <label>Memory Limit(M)</label>
        <input type="text" name="memorylimit" class="form-control">
        <br>
        <label>Content</label>
        <textarea name="content" rows="10" class="form-control"></textarea>
        <br>
        <br>
        <label>Input Case</label>
        <textarea name="inputcase" rows="10" class="form-control"></textarea>
        <br>
        <br>
        <label>Output Case</label>
        <textarea name="outputcase" rows="10" class="form-control"></textarea>
        <br>
        <a href="{{URL('problems/index')}}" class="btn btn-lg btn-info">Cancel</a>
        <input type="submit" value="Add" class="btn btn-lg btn-info"/>
    </form>
@stop
