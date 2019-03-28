@extends('layouts.app')

@section('content')
<h3>Posts</h3>
@if(count($posts)>=1)
  @foreach ($posts as $post )
    <div class="card card-body bg-light">
      <h3 class="card-title"><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
      <h6 class="card-subtitle mb-2 text-muted">Written on: {{$post->created_at}} By: {{$post->user->name}}</h6>
    </div>

  @endforeach
  {{$posts->links()}}

@else
  <p>No post found</p>
@endif

@endsection
{{-- <h6 class="card-subtitle mb-2 text-muted">Written on: {{$post->created_at}} By: {{$post->user->name}}</h6> --}}
