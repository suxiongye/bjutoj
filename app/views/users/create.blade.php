@extends('_layouts.default')

@section('main')

    <h2>Register</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    <form action="{{ URL('admin/store') }}" method="POST">
        <input name="_method" type="hidden" value="POST">
           {{Form::label('username','Username')}}
        <input type="text" name="username" class="form-control" required="required" value="">
        {{Form::label('password','Password')}}
        <input type="password" name="password" class="form-control" required="required" value="">
        {{Form::label('password2','Confirm Password')}}
        <input type="password" name="password2" class="form-control" required="required" value="">
        <br>
        {{Form::label('code','Code')}}
        <input type="password" value="student" name="code">
        <br>
        <a href="{{URL('users/index')}}" class="btn btn-lg btn-info">Cancel</a>
        <input type="submit" class="btn btn-lg btn-info" value="Add">
    </form>
@stop