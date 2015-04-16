@extends('_layouts.default')

@section('main')
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Radio</th>
            <th>Accepted</th>
            <th>Submit</th>
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
    <div>{{$problems->links()}}</div>
@stop