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
                    Στατιστικά
                </div>
                <div class="col-md-3">
                    <a class="button is-primary" href="/profile/statistics/download">
                        <i class="fa fa-download" aria-hidden="true"></i> Αρχείο Βαθμολογίας</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="tabs">
            <ul>
                @if($data['mode']=='perasmena')
                <li><a href="/profile/statistics/general">Γενικές Πληροφορίες</a></li>
                <li class="is-active"><a href="/profile/statistics/perasmena">Περασμένα Μαθήματα
                    </a></li>
                <li><a href="/profile/statistics/xrostoumena">Χρωστούμενα Μαθήματα</a></li>
                @elseif($data['mode']=='xrostoumena')
                <li><a href="/profile/statistics/general">Γενικές Πληροφορίες</a></li>
                <li><a href="/profile/statistics/perasmena">Περασμένα Μαθήματα
                    </a></li>
                <li class="is-active"><a href="/profile/statistics/xrostoumena">Χρωστούμενα Μαθήματα
                    </a></li>
                @else
                <li class="is-active"><a href="/profile/statistics/general">Γενικές Πληροφορίες</a></li>
                <li><a href="/profile/statistics/perasmena">Περασμένα Μαθήματα
                    </a></li>
                <li><a href="/profile/statistics/xrostoumena">Χρωστούμενα Μαθήματα</a></li>

                @endif
            </ul>
        </div>
        @if($data['mode']=='xrostoumena')
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Χρωστούμενα Μαθήματα
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <table class="table  is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead class="has-background-light">
                        <tr>
                            <th>Α/Α</th>
                            <th class="">Μάθημα</th>
                            <th class="">Περίοδος</th>
                            <th class="">Εξάμηνο</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['xrostoumena'] as $key=>$lesson)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="">{{$lesson->name}}</td>
                            <td class="">{{$lesson->periodos}}</td>
                            <td class="">{{$lesson->eksamino}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        @elseif($data['mode']=='perasmena')
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Περασμένα Μαθήματα
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <table class="table  is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                    <thead class="has-background-light">
                        <tr>
                            <th>Α/Α</th>
                            <th class="">Μάθημα</th>
                            <th class="">Περίοδος</th>
                            <th class="">Εξάμηνο</th>
                            <th class="">Βαθμός</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['perasmena'] as $key=>$lesson)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td class="">{{$lesson->name}}</td>
                            <td class="">{{$lesson->periodos}}</td>
                            <td class="">{{$lesson->eksamino}}</td>
                            <td class="">{{$lesson->grade}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($data['mode']=='perasmena')
                {{$data['perasmena']->links()}}
                @else
                {{$data['xrostoumena']->links()}}
                @endif
            </div>
        </div>
        @else
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Γενικές Πληροφορίες
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body ">
                <ul>
                <li>Συνολικός Αριθμός Μαθημάτων:</li>
                <li>Συνολικός Περασμένων Μαθημάτων:</li>
                <li>Συνολικός Χρωστούμενων Μαθημάτων:</li>
                <li>Μέσος Όρος Πτυχίου:</li>
                </ul>
            </div>
        </div>
        @endif
    </div>

</div>
@endsection
