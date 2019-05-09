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
                    <div class="column is-4">
                        <ul>
                            <li>Όνομα:</li>
                            <li>Μάθημα:</li>
                            <li>Ημερομηνία Έναρξης:</li>
                            <li>Προθεσμία Υποβολής:</li>
                            <li>Βαθμός:</li>
                            <li>Συνοδευτικό Αρχείο:</li>
                            <li>Σχόλια:</li>
                        </ul>
                    </div>
                    <div class="column is-4">
                        <ul>
                            <li>{{$data['ergasia']->title}}</li>
                            <li>{{$data['title']}}</li>
                            <li>{{$data['ergasia']->created_at}}</li>
                            <li>{{$data['ergasia']->deadline}}</li>
                            <li>0</li>
                            <td class=""><a href='/lessons/{{$data['title']}}/homework/{{$data['ergasia']->id}}/{{$data['ergasia']->file_path}}''><i
                                        class="fa fa-download" aria-hidden="true"></i>{{$data['ergasia']->file_path}}</a></td>
                            <li>{{$data['ergasia']->description}}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <hr> {{-- parodosi ergasias --}}
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Παράδοση Εργασίας
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open(['action' => ['ErgasiesController@paradosi_ergasias',$data['title'],$data['ergasia']->id], 'method' => 'POST',
                    'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('ergasia_file', 'Αρχείο Εργασίας')}}
                        {{Form::file('ergasia_file')}}
                    </div>
                    {{Form::submit('Παράδοση', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
            </div>
        </div>

    </div>
    @endsection
