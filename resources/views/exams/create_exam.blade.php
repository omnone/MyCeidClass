@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.sidebar-arxiki')
<div class="card" id='whereami'>
    {{$data['eksetastiki']->name}}

</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{-- {{$data['subtitle']}} --}}
                    Δημιουργία Εξέτασης
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
                            Στοιχεία Εξέτασης
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="columns is-0">
                    {!! Form::open(['action' =>
                    ['ExamsController@save_new_exam'], 'method'
                    => 'POST',
                    'enctype' => 'multipart/form-data']) !!}

                    <div class="form-group">
                        {{Form::label('lesson_id', 'Μάθημα προς Εξέταση')}}
                        {{ Form::select('lesson_id', $data['lessons'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε Μάθημα...')) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('date', 'Ημ/νια Εξέτασης')}}
                        {{Form::date('date', new \DateTime(), ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('hour', 'Ώρα Εξέτασης')}}
                        {{ Form::time('hour', Carbon\Carbon::now()->format('H:i'),['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{Form::label('deadline_date', 'Ημ/νια Λήξης Προθεσμίας')}}
                        {{Form::date('deadline_date', new \DateTime(), ['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('deadline_hour', 'Ώρα Λήξης Προθεσμίας')}}
                        {{ Form::time('deadline_hour', Carbon\Carbon::now()->format('H:i'),['class' => 'form-control']) }}
                    </div>
                    {{-- <div class="form-group">
                        {{Form::label('room', 'Αίθουσες')}}
                    {{ Form::select('room', $data['rooms'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε Αίθουσα...')) }}
                </div> --}}

                {{Form::submit('Προσθήκη Εξέτασης', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>

</div>
@endsection
