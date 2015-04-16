@extends('_layouts.default')

@section('main')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>UserName</th>
            <th>Solved</th>
            <th>Submit</th>
            <th>Radio</th>
            <th>Type</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{URL('users/show/'.$user->id)}}">{{ $user->username }}</a></td>
                <td>{{ $user->solved }}</td>
                <td>{{ $user->submit }}</td>
                @if($user->submit!=0)
                    <td>{{round($user->solved/$user->submit,2)}}</td>
                @else
                    <td>0</td>
                @endif
                @if(Sentry::findUserById($user->id)->hasAccess('admin'))
                    <td>Teacher</td>
                @else
                    <td>Student</td>
                @endif

                @if($power==1)
                    <td><a class="btn btn-success btn-mini pull-left" href="{{URL('users/edit/'.$user->id)}}">edit</a></td>
                    @if(Sentry::getUser()->id == $user->id)
                    @else
                    <td><a href="{{URL('users/delete/'.$user->id)}}" class="btn btn-danger btn-mini">delete</a></td>
                    @endif
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{URL('users/refresh')}}" class="btn btn-primary">Refresh</a>
@stop