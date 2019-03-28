@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h3 class="card-title">{{$post->title}}</h3>
        <h6 class="card-subtitle mb-2 text-muted">Written on: {{$post->created_at}} By: {{$post->user->name}}</h6>
        <p class="card-text"> {{$post->body}}</p>
        <hr>
        @if(!Auth::guest())
          @if(Auth::user()->id == $post->user->id)
        <a href="/posts/{{$post->id}}/edit" class='btn btn-primary'>Edit</a>
        {{-- <a href="/posts/{{$post->id}}/edit" class='btn btn-danger'>Delete</a> --}}
        {!!Form::open(['action'=>['PostsContoller@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}
            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
            {!!Form::close()!!}
            @endif
          @endif
    </div>
</div>

@endsection
