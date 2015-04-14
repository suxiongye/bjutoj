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
                <td>{{ $code->id }}</td>
                <td>{{ $code->pro_id }}</td>
                <td>{{ $code->user_id }}</td>
                <td>{{ $code->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@stop