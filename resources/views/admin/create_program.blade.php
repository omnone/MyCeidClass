@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.admin-sidebar')
<div class="card" id='whereami'>
    Εβδομαδιαίο Πρόγραμμα
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{-- {{$data['subtitle']}} --}}
                    Δημιουργία Εβδομαδιαίου Προγράμματος
                </div>
                @if($data['cur_period']!='select')
                <div class="col-md-3">
                    <button href="" class="button is-primary" id="add-button">Προσθήκη Σειράς</button>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="columns is-0">

            @if($data['cur_period'] == 'select')
            {!! Form::open(['action' =>
            ['ProgramController@create_new_program'], 'method'
            => 'GET']) !!}

            <div class="form-group">
                {{Form::label('periodos', 'Παρακαλώ επιλέξτε περίοδο:')}}
                {{ Form::select('periodos', $data['periodoi'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε Περίοδο...')) }}
            </div>


            {{Form::submit('Συνέχεια', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            @elseif(isset($data['lessons']))

            <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth" id="program-table">
                <thead class="has-background-light">
                    <tr>
                        <th>Μάθημα</th>
                        <th>Μέρα Διεξαγωγής</th>
                        <th>Ώρα Διεξαγωγής</th>
                        <th>Αίθουσα</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['lessons'] as $key=>$lesson)
                    <tr id={{'row'.$key}}>
                        {!! Form::open(['action' =>
                        ['ProgramController@save_program'], 'method'
                        => 'POST',
                        'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            <td>
                                {{ Form::hidden('periodos',$data['cur_period'] ) }}
                                {{-- {{Form::label('periodos', 'Παρακαλώ επιλέξτε μάθημα:')}} --}}
                                {{ Form::select('lesson', $data['lessons'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε μάθημα...')) }}
                            </td>
                        </div>
                        <div class="form-group">
                            <td>
                                {{-- {{Form::label('periodos', 'Παρακαλώ επιλέξτε μέρα:')}} --}}
                                {{ Form::select('day', $data['days'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε μέρα...')) }}
                            </td>
                        </div>
                        <div class="form-group">
                            <td>
                                {{-- {{Form::label('hour', 'Ώρα Εξέτασης')}} --}}
                                {{ Form::select('hour', $data['hours'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε μάθημα...')) }}
                            </td>
                        </div>
                        <div class="form-group">
                            <td>
                                {{ Form::select('aithousa', $data['rooms'], null, array('class'=>'form-control', 'placeholder'=>'Επίλεξε αίθουσα...')) }}
                            </td>
                        </div>

                        <td>
                            {{Form::submit('Αποθήκευση', ['class'=>'btn btn-primary'])}}
                        </td>
                        {!! Form::close() !!}
                    </tr>
                    @endforeach
                    {{-- @endif --}}
                </tbody>
            </table>
            {{-- {{$data['eksetaseis']->links()}} --}}

            @endif
        </div>
    </div>
</div>

</div>
@endsection
