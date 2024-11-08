@extends('layouts.app')

@section("content")

question: {{session('question')}}
<h2>anser here</h2>
{!! session('answer') !!}

@endsection