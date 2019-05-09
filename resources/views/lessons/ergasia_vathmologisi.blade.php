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
                            <li>Υποβολές:</li>
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
                            <li>{{$data['ypovoles']->count()}}</li>
                            <td class=""><a href='/lessons/{{$data['title']}}/homework/{{$data['ergasia']->id}}/{{$data['ergasia']->file_path}}''><i
                                        class="fa fa-download" aria-hidden="true"></i>{{$data['ergasia']->file_path}}</a></td>
                            <li>{{$data['ergasia']->description}}</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Υποβολές
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead class="has-background-light">
                        <tr>
                            <th class="">Φοιτητής</th>
                            <th class="">Αρχείο</th>
                            <th class="">Ημ/νια Υποβολής</th>
                            <th class="">Βαθμός</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['ypovoles'] as $ypovoli)
                            <tr>
                                    <td class="">{{$ypovoli->student->name}} {{$ypovoli->student->surname}}</td>
                                    <td class="" ><a href='/lessons/{{$data['title']}}/homework/{{$data['ergasia']->id}}/{{$ypovoli->file_path}}'><i class="fa fa-download" aria-hidden="true"></i> {{$ypovoli->file_path}}</a></td>
                                    <td class="">{{$ypovoli->created_at}}</td>
                                    <td>{{$ypovoli->grade}}</td>
                                </tr>
                        @endforeach
                            </tbody>
                        </table>
            </div>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Βαθμολόγηση Εργασίας
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! Form::open() !!}

                <div class="form-group">
                    {!! Form::label('name', 'Αρχείο: ', []) !!}
                    {{Form::file('notes')}}
                </div>
                {{Form::submit('Υποβολή', ['class'=>'button is-info','disabled'])}} {!! Form::close() !!}
            </div>
        </div>

    </div>
    @endsection
