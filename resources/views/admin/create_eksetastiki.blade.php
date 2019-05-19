@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.admin-sidebar')
<div class="card" id='whereami'>
    Διαχείριση Εξεταστικών Περιόδων
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{-- {{$data['subtitle']}} --}}
                    Δημιουργία Εξεταστικής
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="columns is-0">
            {!! Form::open(['action' =>
            ['AdminController@save_eksetastiki'], 'method'
            => 'POST',
            'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Τίτλος')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Τίτλος' ,'required' => 'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('deadline_date', 'Ημ/νια Λήξης Προθεσμίας')}}
                {{Form::date('deadline_date', new \DateTime(), ['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{Form::label('deadline_hour', 'Ώρα Λήξης Προθεσμίας')}}
                {{ Form::time('deadline_hour', Carbon\Carbon::now()->format('H:i'),['class' => 'form-control']) }}
            </div>

            {{Form::submit('Προσθήκη Εξεταστικής', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>

</div>
@endsection
