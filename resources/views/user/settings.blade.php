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
                    Ρυθμίσεις
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="container-custom">
            {!! Form::open(['action' => ['ProfileController@profile_update'], 'method' => 'POST',
            'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Όνομα')}}
                {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Όνομα'])}}
            </div>
            <div class="form-group">
                {{Form::label('surname', 'Επώνυμο')}}
                {{Form::text('surname', $user->surname, ['class' => 'form-control', 'placeholder' => 'Επώνυμο'])}}
            </div>
            <div class="form-group">
                {{Form::label('email', 'Email')}}
                {{Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
            </div>
            <div class="form-group">
                {{Form::label('password', 'Κωδικός Χρήστη')}}
                {{ Form::password('password',['class' => 'form-control', 'placeholder' => 'Κωδικός Χρήστη']) }}
            </div>
            <div class="form-group">
                {{Form::label('profile_photo', 'Φωτογραφία Προφίλ')}}
                <figure class="image is-128x128">
                    @if(Auth::user()->profile_photo!==null)
                    <img src={{url('/storage/profile_photos/'.Auth::user()->profile_photo->filepath) }}>
                    @else
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                    @endif
                </figure>
                {{Form::file('profile_photo')}}
            </div>
            {{Form::submit('Αποθήκευση', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>

</div>
@endsection
