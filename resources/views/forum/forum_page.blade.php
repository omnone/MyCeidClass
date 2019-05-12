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
                    Forum
                </div>
                <div class="col-md-3">
                    @if(Auth::user()->role !='student')
                    <a class="button is-primary" href="/lessons/{{$data['title']}}/forum/create">
                        Δημιουργία Συζήτησης</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light ">
                <tr>
                    <th class="has-text-centered">Συζήτηση</th>
                    <th class="has-text-centered">Περιγραφή</th>
                    <th class="has-text-centered">Αναρτήσεις</th>
                    <th class="has-text-centered">Τελευταία ανάρτηση</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['sizitiseis'] as $sizitisi)
                <tr>
                    <td class="has-text-centered"><a href="/lessons/{{$data['title']}}/forum/{{$sizitisi->id}}">
                            <b>{{$sizitisi->title}}</b>
                        </a>
                        <div class="smaller">{{$sizitisi->created_at}}</div>
                        <div class="smaller"></div>
                    </td>
                    <td class="text-center">{{$sizitisi->description}}</td>
                    <td class="text-center">20</td>
                    <td class="text-center"><span class="smaller">Ξοε Δοε&nbsp;<a href=""><span class="fa fa-comment-o"
                                    title="" data-toggle="tooltip"
                                    data-original-title="Τελευταία ανάρτηση"></span></a><br>08/04/2019
                            - 13:05</span>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
