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
        <label>title</label>
        <input type="text" name="title" class="form-control" required="required">
        <label>timelimit</label>
        <input type="text" name="timelimit" class="form-control" required="required">
        <label>memorylimit</label>
        <input type="text" name="memorylimit" class="form-control" required="required">
        <br>
        <label>content</label>
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <br>
        <label>input case</label>
        <textarea name="inputcase" rows="10" class="form-control" required="required"></textarea>
        <br>
        <br>
        <label>output case</label>
        <textarea name="outputcase" rows="10" class="form-control" required="required"></textarea>
        <br>
        <a href="{{URL('problems/index')}}">Cancel</a>
        <button class="btn btn-lg btn-info">Add</button>
    </form>
@stop
