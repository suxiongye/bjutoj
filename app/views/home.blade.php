@extends('_layouts.default')

@section('main')
    problems list
    <table class="">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>radio</th>
            <th>accepted</th>
            <th>submit</th>
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
            </tr>
        @endforeach
        </tbody>
    </table>
@stop