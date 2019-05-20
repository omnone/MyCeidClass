@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.admin-sidebar')
<div class="card" id='whereami'>
    Διαχείριση Εξεταστικών Περιόδων
</div>

<br>

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{$data['eksetastiki']->name}}
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
                    <th>Αίθουσες</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['eksetaseis'] as $eksetasi)
                <tr>
                    {!!Form::open(['action' =>
                    ['AdminController@update_eksetastiki'], 'method'
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
                            {{ Form::date('imerominia_eksetasis',$eksetasi->imerominia_eksetasis,['class' => 'form-control']) }}
                        </td>
                    </div>
                    <div class="form-group">
                        <td>{{ Form::time('ora_eksetasis', $eksetasi->ora_eksetasis,['class' => 'form-control']) }}
                        </td>
                    </div>
                    <td>@foreach($eksetasi->rooms as $room)
                        {{$room->name}},
                        @endforeach</td>
                    <td>{{Form::submit('Οριστικοποίηση', ['class'=>'btn btn-primary'])}}
                    </td>
                    {!! Form::close() !!}
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$data['eksetaseis']->links()}}
    </div>
</div>
    @endsection
