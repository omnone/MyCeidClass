@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.sidebar-arxiki')
<div class="card" id='whereami'>
    Εξέταση Μαθήματος: {{$data['eksetasi']->lesson->name}}

</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{-- {{$data['subtitle']}} --}}
                    Επιλογή Αίθουσών
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <ul>
            <li>Ημ/νια Εξέτασης: {{$data['eksetasi']->imerominia_eksetasis}}</li>
            <li>Ώρα Εξέτασης: {{$data['eksetasi']->ora_eksetasis}}</li>
            <li>Αριθμός Φοιτητών: {{$data['eksetasi']->simmetoxes->count()}}</li>
            @if($data['selected_rooms']!="")
            <li>Επιλεγμένες Αίθουσες: {{$data['selected_rooms']}}</li>
            @endif
            <li>Διαθέσιμες Αίθουσες:</li>
        </ul>
        {!! Form::open(['action' =>
        ['ExamsController@save_aithouses_eksetastikis',$data['eksetasi']->id], 'method'
        => 'POST',
        'enctype' => 'multipart/form-data'])!!}
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Αίθουσα</th>
                    <th>Χωρητικότητα</th>
                    <th>Επιλογή</th>

                </tr>
            </thead>
            <tbody>
                {{-- @if(count($data['eksetaseis']) > 0) --}}

                @foreach ($data['rooms'] as $room)
                <tr>
                    <td>{{$room->name}}</td>
                    <td>{{$room->capacity}} άτομα</td>
                    <td>
                        <div class="form-group">
                            {!! Form::checkbox('selected_rooms[]', $room->id,false) !!}
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{Form::submit('Αποθήκευση Επιλογής', ['class'=>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>

</div>
@endsection
