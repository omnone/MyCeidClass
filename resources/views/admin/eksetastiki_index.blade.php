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
                    {{$data['eksetastiki']->name}}
                </div>
                <div class="col-md-3">

                    <a class="button is-primary" href="/exams/create">
                        Δημιουργία Εξέτασης</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Μάθημα</th>
                    <th>Υπεύθυνος</th>
                    <th>Ημ/νια Εξέτασης</th>
                    <th>Ώρα Εξέτασης</th>
                    <th>Συμμετοχές</th>
                    <th>Αίθουσες</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                {{-- @if(count($data['eksetaseis']) > 0) --}}
                @foreach ($data['eksetaseis'] as $eksetasi)
                <tr>
                    {!!Form::open(['action' =>
                    ['AdminController@save_eksetastiki'], 'method'
                    => 'POST',
                    'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{ Form::hidden('lesson_id', $eksetasi->lesson->id) }}
                        <td>{{$eksetasi->lesson->name}}</td>
                    </div>
                    <td>{{$eksetasi->lesson->teacher->name}}
                        {{$eksetasi->lesson->teacher->name}}<br><small>{{$eksetasi->lesson->teacher->email}}</small>
                    </td>
                    <div class="form-group">
                        <td>
                            {{ Form::date('date_eksetasi',$eksetasi->imerominia_eksetasis,['class' => 'form-control']) }}
                            {{-- {{$eksetasi->imerominia_eksetasis}} --}}
                        </td>
                    </div>
                    <div class="form-group">
                        <td>{{ Form::time('deadline_hour', $eksetasi->ora_eksetasis,['class' => 'form-control']) }}
                            {{-- {{$eksetasi->ora_eksetasis}} --}}
                        </td>
                    </div>
                    <td>0</td>
                    <td>{{$eksetasi->rooms}}</td>
                    <td>{{Form::submit('Οριστικοποίηση Εξέτασης', ['class'=>'btn btn-primary'])}}
                    </td>
                    {!! Form::close() !!}
                </tr>
                @endforeach
                {{-- @endif --}}
            </tbody>
        </table>
        {{-- {{$data['eksetaseis']->links()}} --}}
    </div> @endsection
