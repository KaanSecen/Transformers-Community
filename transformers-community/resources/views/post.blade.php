@extends('layouts.layout')

@section('first-item')
        <h1 class="text-center font-bold-slider">
            {!! $post->title !!}
        </h1>
        <h4 class="text-center font-bold-slider">Geschreven door <a href="/authors/{{ $post->author->username }}" class="topic">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="topic">{{ $post->category->name }}</a></h4>
@endsection
@section('second-item')
        <img src="https://static.wixstatic.com/media/e72157_c01472345d2b461381e28a781dc86d9f~mv2.png/v1/fill/w_796,h_450,al_c,q_85,usm_0.66_1.00_0.01/e72157_c01472345d2b461381e28a781dc86d9f~mv2.webp" class="rounded mx-auto d-block w-auto" alt="...">
        <p class="text-center rounded" style="background-color: white; color:black;margin-top: 25px;">
            {!! $post->body !!}
        </p>
        <a href="/" class="font-bold-slider topic"><h6 class="text-center">Ga terug</h6></a>
@endsection