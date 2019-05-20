@extends('layouts.app')
@section('content')
{{-- @if ($data['title'] != "Μαθήματα") --}}
@include('layouts.sidebar-mathima')
{{-- @else
    @include('layouts.sidebar-arxiki')
@endif --}}
<div class="card" id='whereami'>
    {{$data['title']}}
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    Συζήτηση: {{$data['subtitle']}}
                </div>
                <div class="col-md-3">

                    <a class="button is-primary"
                        href="/lessons/{{$data['title']}}/forum/create/{{$data['sizitisi']->id}}/0">
                        Δημιουργία Ανάρτησης</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>&nbsp;Θέμα</th>
                    <th>Από</th>
                    <th>Απαντήσεις</th>
                    <th>Τελευταίο μήνυμα</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['anartiseis']) > 0)
                @foreach ($data['anartiseis'] as $anartisi)
                <tr>
                    <td class=""><a
                            href="/lessons/{{$data['title']}}/forum/{{$data['sizitisi']->id}}/{{$anartisi->id}}">
                            <b>{{$anartisi->title}}</b>
                        </a>
                        <div class="smaller">{{$anartisi->created_at}}</div>
                    </td>
                    <td class="">{{$anartisi->posted_by->name}} {{$anartisi->posted_by->surname}}</td>
                    <td class="">{{$anartisi->apantiseis->count()}}</td>
                    <td class="">
                        @if($anartisi->latest_post)
                        <span
                            class="smaller">{{$anartisi->latest_post->posted_by->surname}} {{$anartisi->latest_post->posted_by->name}}&nbsp;<a
                                href="">
                                <span class="fa fa-comment-o" title="" data-toggle="tooltip"
                                    data-original-title="Τελευταία ανάρτηση"></span></a><br>
                            {{$anartisi->latest_post->created_at}}</span>
                        @endif
                    </td>

                </tr>
                @endforeach

                @endif


            </tbody>
        </table>
        {{$data['anartiseis']->links()}}


    </div>
    @endsection
