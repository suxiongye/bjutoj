@extends('_layouts.default')

@section('main')
    <div id="onepage">
        <div class="control-group">
            <h2>User Id</h2>
            <div class="controls">
             {{$user->id}}
            </div>
        </div>
        <div class="control-group">
            <h2>UserName</h2>
            <div class="controls">
                {{ $user->username }}
            </div>
        </div>
        <div class="control-group">
            <h2>Solved</h2>
            <div class="controls">
           {{$user->solved}}
            </div>
        </div>
        <div class="control-group">
            <h2>Submit</h2>
            <div class="controls">
                {{$user->submit}}
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
        <div class="control-group">
            <h2>Solved List</h2>
            <div class="controls">
               @foreach($solves as $solve)
                   {{$solve->pro_id}}
                   @endforeach
            </div>
        </div>
    </div>
    @if(Sentry::getUser()->id==$user->id)
        <a href="{{URL('users/edit/'.$user->id)}}" class="btn btn-lg btn-info">Edit</a>
        @endif
    <a href="{{URL('users/index')}}" class="btn btn-lg btn-info">Return</a>

@stop