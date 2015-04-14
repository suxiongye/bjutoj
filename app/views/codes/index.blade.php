@extends('_layouts.default')

@section('main')
    codes list
    <table class="">
        <thead>
        <tr>
            <th>#</th>
            <th>ProblemId</th>
            <th>UserId</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($codes as $code)
            <tr>
                <td><a href="{{URL('codes/show/'.$code->id)}}">{{ $code->id }}</a></td>
                <td><a href="{{URL('problems/show/'.$code->pro_id)}}">{{$code->pro_id }}</a></td>
                <td>{{ $code->user_id }}</td>
                <td>{{ $code->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <a href="{{URL('codes/refresh')}}">Refresh</a>
@stop