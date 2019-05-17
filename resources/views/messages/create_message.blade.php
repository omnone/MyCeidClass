@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@if(Auth::user()->role == 'admin')
@include('layouts.admin-sidebar')
@else
@include('layouts.sidebar-arxiki')
@endif

<div class="card" id='whereami'>
    Μηνύματα
</div>
<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    Δημιουργία Μηνύματος
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="columns is-0">

            {!! Form::open(['action' => ['MessagesController@send_message'], 'method' => 'POST',
            'enctype' => 'multipart/form-data']) !!}

            <div class="form-group">
                {{Form::label('receiver', 'Παραλήπτης')}}
                {!! Form::text('receiver',null,['id' => 'userbox','class'=>'input','placeholder'=>"Παραλήπτης",'required' => 'required'])!!}
            </div>
            <div class="form-group">
                {{Form::label('all_prof', 'Προς Καθηγητές')}}
                {{ Form::radio('all_prof', 'all_prof' , false) }}

                {{Form::label('all_stud', 'Προς Φοιτητές')}}
                {{ Form::radio('all_stud', 'all_stud' , false) }}
            </div>
            <hr>
            <div class="form-group">
                {{Form::label('title', 'Τίτλος')}}
                {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Τίτλος','required' => 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('content', 'Μήνυμα')}}
                {{Form::textarea('content', null, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Μήνυμα'])}}
            </div>
            <div class="form-group">
                {{Form::label('file', 'Συνημένο Αρχείο')}}
                {{Form::file('file')}}
            </div>
            {{Form::submit('Αποστολή', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>


</div>
@endsection
