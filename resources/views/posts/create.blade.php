@extends('layouts.app')

@section('content')
<h3>Create Posts</h3>
{!! Form::open(['action'=>'PostsContoller@store','method'=>'POST']) !!}
    <div class="form-group">
      {{Form::label('title','Title')}}
      {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('body','Body')}}
      {{Form::textarea('body','',['class'=>'form-control','placeholder'=>'Body Text'])}}
    </div>
    {{-- sumbit butto --}}
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection
