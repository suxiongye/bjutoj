@extends('_layouts.default')

@section('main')

    <h2>Code Create</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    <form action="{{ URL('codes/store') }}" method="POST">
        <input name="_method" type="hidden" value="POST">
        <input name="pro_id" type="hidden" value="{{$problem->id}}">
        <label>content</label>
        <textarea name="content" rows="10" class="form-control" required="required"></textarea>
        <br>
        <br>
        <a href="{{URL('codes/index')}}">Cancel</a>
        <button class="btn btn-lg btn-info">Submit</button>
    </form>
@stop
