@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/answer.css')}}">
@endsection

@section("content")
<div id="content">
    <h2>Your question</h2>
    <p>{{session('question')}}</p>

    <h2>Answer from AI</h2>
    {!! session('answer') !!}
    <h2><a href="/mychat/">Ask another question</a></h2>
</div>
@endsection