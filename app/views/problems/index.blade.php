@extends('_layouts.default')

@section('main')
    problems list
    <a href="{{URL('problems/create')}}">add new problem</a>
    <table class="">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>radio</th>
            <th>accepted</th>
            <th>submit</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($problems as $problem)
            <tr>
                <td>{{ $problem->id }}</td>
                <td><a href="{{URL('problems/show/'.$problem->id)}}">{{ $problem->title }}</a></td>
                <td>{{ $problem->radio }}</td>
                <td>{{ $problem->accepted }}</td>
                <td>{{ $problem->submit }}</td>
                <td><a href="{{URL('problems/edit/'.$problem->id)}}">edit</a></td>
                <td><a href="{{URL('problems/delete/'.$problem->id)}}">delete</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop