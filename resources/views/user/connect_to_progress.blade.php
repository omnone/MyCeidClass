@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.sidebar-arxiki')
<div class="card" id='whereami'>
    Διαχείριση Προφίλ
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    Στατιστικά
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Σύνδεση στο Progress
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body" id="progress-body">
                <div id="form-progress">
                    {!! Form::open(['action' => ['ProfileController@scrape_progress'], 'method' => 'POST',
                    'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('username', 'Όνομα Χρήστη')}}
                        {{Form::text('username', '', ['class' => 'form-control', 'placeholder' => 'Όνομα Χρήστη'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Κωδικός Χρήστη')}}
                        {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Κωδικός Χρήστη']) }}
                    </div>
                    {{Form::submit('Σύνδεση', ['id'=>'connect-progress-btn','class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>

            </div>

        </div>

    </div>
    @endsection
