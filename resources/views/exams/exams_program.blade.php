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
                    Πρόγραμμα Εξεταστικής
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Μάθημα</th>
                    <th>Ημ/νια Εξέτασης</th>
                    <th>Συμμετοχές</th>
                    <th>Προθεσμία Δήλωσης</th>
                    <th>Αίθουσες</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['eksetaseis']) > 0)
                @foreach ($data['eksetaseis'] as  $eksetasi)
                <tr>
                    <td>{{$eksetasi->lesson->name}}</td>
                    <td>{{$eksetasi->imerominia_eksetasis}} {{$eksetasi->ora_eksetasis}}</td>
                    <td>{{$eksetasi->simmetoxes->count()}}</td>
                    @if(Carbon\Carbon::today() > $eksetasi->prothesmia_dilosis)
                    <td>{{$eksetasi->prothesmia_dilosis}}<br><small>(<span class="text-danger">έχει λήξει</span>)</td>
                    @else
                    <td>{{$eksetasi->prothesmia_dilosis}}<br><small>(Απομένουν
                        {{ \Carbon\Carbon::parse($eksetasi->prothesmia_dilosis)->diff(\Carbon\Carbon::now())->days }} μέρες)</td>
                    @endif
                    <td>
                        @foreach($eksetasi->rooms as $room)
                        {{$room->name}},
                        @endforeach
                        </td>

                </tr>
                @endforeach

                @endif


            </tbody>
        </table>
    </div>

</div>
@endsection
