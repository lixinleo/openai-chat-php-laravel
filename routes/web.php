<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect()->route('mychat.index');
});

Route::get('/mychat', function () {
    return view('index');
})->name("mychat.index");

Route::get("/answer", function () {
    return view("answer");
})->name("mychat.answer");

Route::post("/mychat", function (Request $request) {
    //make a openai api call
    $client = OpenAI::client(env('OPENAI_API_KEY'));
    $result = $client->chat()->create([
        //'model' => 'gpt-4o-mini',
        'model' => 'o1-mini',
        'messages' => [
            ['role' => 'user', 'content' => $request->input("question")],
        ],
    ]);

    $ans = $result->choices[0]->message->content;

    //convert to html
    $Parsedown = new Parsedown();
    $html = $Parsedown->text($ans);

    return redirect()->route('mychat.answer')->with(['answer' => $html, "question" => $request->input("question")]);
})->name("mychat.post");
