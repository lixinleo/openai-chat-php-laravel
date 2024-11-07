@extends('layouts.app')

@section("content")

<form action="" method="POST">
    @csrf
    <div class="form-control"><label for="id_question">Ask AI a question:</label>
        <textarea name="question" cols="40" rows="10" placeholder="your question" autofocus required id="id_question"></textarea>
    </div>
    <button type="submit">Send</button>
</form>

@endsection