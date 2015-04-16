@extends('_layouts.default')

@section('main')
    <h2>Problem {{$problem->id}}</h2>
    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    <form action="{{ URL('codes/store') }}" method="POST">
        <input name="_method" type="hidden" value="POST">
        <input name="pro_id" type="hidden" value="{{$problem->id}}">
        <div class="title"><h2>content</h2></div>
        <textarea name="content" rows="25" class="body" style="width: 800px"></textarea>
        <br>
        <br>
        <a href="{{URL('codes/index')}}" class="btn btn-lg btn-info">Cancel</a>
        <input type="submit" class="btn btn-lg btn-info" value="Submit"/>
    </form>
@stop
