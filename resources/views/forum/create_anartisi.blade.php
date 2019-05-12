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
                    @if($data['anartisi_id'] === 0)
                    {{$data['subtitle']}}
                    @else
                    Απάντηση σε : {{$data['anartisi']->title}}
                    @endif
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
                            @if($data['anartisi_id'] === 0)
                            Προσθήκη Ανάρτησης
                            @else
                            Απάντηση
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="columns is-0">

                    {!! Form::open(['action' =>
                    ['ForumController@create_post',$data['title'],$data['sizitisi']->id,$data['anartisi_id']], 'method'
                    => 'POST',
                    'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        @if($data['anartisi_id'] === 0)
                        {{Form::label('title', 'Τίτλος')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Τίτλος'])}}
                        @else
                        {{ Form::hidden('title', 'is an answer') }}
                        @endif
                    </div>
                    <div class="form-group">
                        @if($data['anartisi_id'] === 0)
                        {{Form::label('description', 'Περιγραφή')}}
                        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Περιγραφή'])}}
                        @else
                        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => ''])}}
                        @endif
                    </div>
                    {{Form::submit('Ανάρτηση', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    </div>
    @endsection
