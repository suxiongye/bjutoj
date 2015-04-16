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
                @if($power==1)
                    <td><a class="btn btn-success btn-mini pull-left" href="{{URL('problems/edit/'.$problem->id)}}">edit</a></td>
                    <td><a href="{{URL('problems/delete/'.$problem->id)}}" class="btn btn-danger btn-mini">delete</a></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{$problems->links()}}</div>
    <br>
    @if($power==1) <a href="{{URL('problems/create')}}" class="btn btn-primary">add new problem</a> @endif
    <a href="{{URL('problems/refresh')}}" class="btn btn-primary">Refresh</a>
@stop