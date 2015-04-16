@extends('_layouts.default')

@section('main')

    <h2>User Edit</h2>

    @if ($errors->any())
        <div class="alert alert-error">
            {{ implode('<br>', $errors->all()) }}
        </div>
    @endif
    <form action="{{ URL('users/update/'.$user->id) }}" method="POST">
        <input name="_method" type="hidden" value="POST">
        <div class="control-group">
            <h2>User ID</h2>
            <div class="controls">
                {{ $user->id }}
            </div>
        </div>

        <div class="control-group">
            <h2>UserName</h2>
            <div class="controls">
                <input type="text" name="username" required="required" value="{{ $user->username }}">
            </div>
        </div>

        <div class="control-group">
            <h2>Solved</h2>
            <div class="controls">
                {{ $user->solved }}
            </div>
        </div>

        <div class="control-group">
            <h2>Submit</h2>
            <div class="controls">
                {{ $user->submit }}
            </div>
        </div>

        <div class="control-group">
            <h2>Radio</h2>
            <div class="controls">
                @if($user->submit!=0)
                {{round($user->solved/$user->submit,2)}}
                @else
                0
                @endif
            </div>
        </div>
        <div class="form-actions">
        <a href="{{URL('users/index')}}" class="btn btn-lg btn-info">Cancel</a>
            <input type="submit" class="btn btn-lg btn-info" value="Save">
        </div>
    </form>
@stop
