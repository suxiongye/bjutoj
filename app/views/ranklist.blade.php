@extends('_layouts.default')

@section('main')
    RankList
    <table class="">
        <thead>
        <tr>
            <th>Rank</th>
            <th>User_id</th>
            <th>Username</th>
            <th>solved</th>
            <th>submit</th>
            <th>rate</th>
        </tr>
        </thead>
        <tbody>
        <input type="hidden" value="{{$i = 1}}">
        @foreach ($users as $user)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->solved }}</td>
                <td>{{$user->submit}}</td>
                @if($user->submit!=0)
                <td>{{round($user->solved/$user->submit,2)}}</td>
                    @else
                <td>0</td>
                    @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@stop