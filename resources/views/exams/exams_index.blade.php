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
                    Μαθήματα προς εξέταση
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!! Form::open(['action' =>
        ['ParticipationExamsController@apothikeuse_dilosi_eksetastiki'],'method'=> 'POST','enctype' =>
        'multipart/form-data'])!!}
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Μάθημα</th>
                    <th>Ημ/νια Εξέτασης</th>
                    <th>Προθεσμία Δήλωσης</th>
                    <th>Αίθουσες</th>
                    <th>Συμμετοχή</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if(count($data['eksetaseis']) > 0) --}}

                @foreach ($data['eksetaseis'] as $eksetasi)
                <tr>
                    <td>{{$eksetasi->lesson->name}}</td>
                    <td>{{$eksetasi->imerominia_eksetasis}} {{$eksetasi->ora_eksetasis}}</td>
                    <td>{{$eksetasi->prothesmia_dilosis}}</td>
                    <td>@foreach($eksetasi->rooms as $room)
                        {{$room->name}},
                        @endforeach</td>
                    <td>
                        <div class="form-group">
                            @if($data['simmetoxes']->contains('eksetasi_id', $eksetasi->id))
                            {{-- {{ Form::hidden('mode', 'unsubscribe') }} --}}
                            {!! Form::checkbox('lessons[]', $eksetasi->id,true) !!}
                            @else
                            {{-- {{ Form::hidden('mode', 'subscribe') }} --}}
                            {!! Form::checkbox('lessons[]', $eksetasi->id,false) !!}
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        {{Form::submit('Αποθήκευση Δήλωσης', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
        {{-- {{$data['eksetaseis']->links()}} --}}

    </div>
    @endsection
