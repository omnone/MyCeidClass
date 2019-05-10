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
            </div>
        </div>
    </div>
    <div class="card-body">
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
                    <div class="card-body">
                        <table class="table is-scrollable is-bordered is-striped is-narrow is-hoverable is-fullwidth">
                            <thead class="has-background-light">
                                <tr>
                                    <th class="">Μάθημα</th>
                                    <th class="">Περίοδος</th>
                                    <th class="">Εξάμηνο</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['xrostoumena'] as $lesson)
                                <tr>
                                    <td class="">{{$lesson->name}}</td>
                                    <td class="">{{$lesson->periodos}}</td>
                                    <td class="">{{$lesson->eksamino}}</td>
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
                                   Περασμένα Μαθήματα
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
        </div>

    </div>
    @endsection
