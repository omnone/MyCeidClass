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
                            Στοχεία Εργασίας
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="columns is-0">

                    {!! Form::open(['action' => ['ErgasiesController@store_ergasia',$data['title']], 'method' => 'POST',
                    'enctype' => 'multipart/form-data']) !!}
                     <div class="form-group">
                        {{Form::label('lesson_id', 'Μάθημα')}}
                        {{ Form::select('lesson_id', $data['lessons'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε Μάθημα...')) }}                    </div>
                    <div class="form-group">
                        {{Form::label('title', 'Τίτλος')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Τίτλος'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('deadline_date', 'Ημν/ια Λήξης')}}
                        {{Form::date('deadline_date', new \DateTime(), ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('deadline_hour', 'Ώρα Λήξης')}}
                        {{ Form::time('deadline_hour', Carbon\Carbon::now()->format('H:i'),['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Περιγραφή')}}
                        {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Περιγραφή'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('ergasia_file', 'Αρχείο Εργασίας')}}
                        {{Form::file('ergasia_file')}}
                    </div>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    </div>
    @endsection
