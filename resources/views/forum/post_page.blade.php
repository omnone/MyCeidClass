@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.sidebar-arxiki')
<div class="card" id='whereami'>
    {{$data['title']}}</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{$data['subtitle']}}
                </div>
                <div class="col-md-3">
                    <a class="button is-primary" href="/lessons/{{$data['title']}}/forum/create/{{$data['anartisi']->sizitisi->id}}/{{$data['anartisi']->id}}">
                        Δημιουργία Απάντησης</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light ">
                <tr>
                    <th class="">Μέλος</th>
                    <th class="">Μήνυμα</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="">
                        <b>{{$data['anartisi']->posted_by->name}} {{$data['anartisi']->posted_by->surname}}</b>
                        <div class="smaller"></div>
                        <div class="smaller"></div>
                    </td>
                    <td class=""><small class="text-muted"><b>Στάλθηκε:</b> {{$data['anartisi']->created_at}}</small>
                        <hr>
                        {{$data['anartisi']->description}}
                    </td>

                </tr>
                @foreach ($data['apantiseis'] as $apantisi)
                <tr>
                    <td class="">
                        <b>{{$apantisi->posted_by->name}} {{$apantisi->posted_by->surname}}</b>
                        <div class="smaller"></div>
                        <div class="smaller"></div>
                    </td>
                    <td class=""><small class="text-muted"><b>Στάλθηκε:</b> {{$apantisi->created_at}}</small>
                        <hr>
                        {{$apantisi->description}}
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
