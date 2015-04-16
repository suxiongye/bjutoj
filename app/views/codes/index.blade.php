@extends('_layouts.default')

@section('main')
    <table class="table table-striped">
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
                @if($power==1 || $user->id == $code->user_id)
                    <td><a href="{{URL('codes/show/'.$code->id)}}">{{ $code->id }}</a></td>
                @else
                    <td>{{ $code->id }}</td>
                @endif
                    <td><a href="{{URL('problems/show/'.$code->pro_id)}}">{{$code->pro_id }}</a></td>
                <td>{{ $code->user_id }}</td>
                <td>{{ $code->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{{$codes->links()}}</div>
    <br>
    @if($power == 1)
    <a href="{{URL('codes/refresh')}}" class="btn btn-primary">Refresh</a>
    @else
        <a href="{{URL('codes/index')}}" class="btn btn-primary">Refresh</a>
    @endif
@stop