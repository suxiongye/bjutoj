@extends('_layouts.default')

@section('main')

    <div id="login" class="login">

        {{ Form::open() }}

        @if ($errors->has('login'))

            <div class="alert alert-error">{{ $errors->first('login', ':message') }}</div>

        @endif

        <div class="control-group">

            {{ Form::label('username', 'Username') }}

            <div class="controls">

                {{ Form::text('username') }}

            </div>
        </div>

        <div class="control-group">

            {{ Form::label('password', 'Password') }}

            <div class="controls">

                {{ Form::password('password') }}

            </div>
        </div>

        <div class="form-actions">
            {{ Form::submit('Login', array('class' => 'btn btn-inverse btn-login')) }}
            <a href="{{URL('/')}}" class="btn btn-inverse btn-login">Return</a>
            {{ Form::close() }}
        </div>
    </div>
@stop