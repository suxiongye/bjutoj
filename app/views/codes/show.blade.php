@extends('_layouts.default')

@section('main')

    <h2>Code</h2>

    <div id="">
        Code id = {{$code->id}}
        <hr/>
        problem Id
        <div class="">
            <h3>{{ $code->pro_id }}</h3>
        </div>
        code content
        <div class="">
           {{$code->content}}
        </div>
        code status
        <div class="body">
            {{ $code->status }}
        </div>
        code remarks
        <div class="body">
            {{ $code->remarks }}
        </div>
    <a href="{{URL('codes/index')}}">Return</a>

@stop