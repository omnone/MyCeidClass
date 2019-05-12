@extends('layouts.app')
@section('content') {{-- titlos selidas --}} @if ($data['title'] != "Μαθήματα")
@include('layouts.sidebar-mathima')
@else
@include('layouts.sidebar-arxiki') @endif
<div class="card" id='whereami'>
    {{$data['title']}}
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{$data['subtitle']}}
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{-- stoixeia ergasias --}}
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Στοιχεία Συζήτησης
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="columns is-0">

                    {!! Form::open(['action' => ['ForumController@create_sizitisi',$data['title']], 'method' => 'POST',
                    'enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {{Form::label('title', 'Τίτλος')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Τίτλος'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Περιγραφή')}}
                        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Περιγραφή'])}}
                    </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    </div>
    @endsection
