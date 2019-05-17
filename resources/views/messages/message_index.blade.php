@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@if(Auth::user()->role == 'admin')
@include('layouts.admin-sidebar')
@else
@include('layouts.sidebar-arxiki')
@endif

<div class="card" id='whereami'>
    Μηνύματα
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="tabs">
                        <ul>
                            @if($data['mode']=='inbox')
                            <li class="is-active"><a href="/messages/inbox">Εισερχόμενα
                                    @if($num_inbox>0)
                                    ({{$num_inbox}})
                                    @endif
                                </a></li>
                            <li><a href="/messages/send">Σταλμένα</a></li>
                            @else
                            <li><a href="/messages/inbox">Εισερχόμενα
                                    @if($num_inbox>0)
                                    ({{$num_inbox}})@endif
                                </a></li>
                            <li class="is-active"><a href="/messages/send">Σταλμένα
                                </a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <a class="button is-primary" href="/messages/create">
                        Δημιουργία Μηνύματος</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body ">

        <h4 class="title is-4">Θέμα: {{$data['message']->title}}</h4>
        <h6 class="subtitle is-6">Ημερομηνία: {{$data['message']->created_at}} |
            @if($data['message']->sender->name=='Admin')
            Από: {{$data['message']->sender->name}}
            @else
            Από: {{$data['message']->sender->name}} {{$data['message']->sender->surname}}
            @endif
        </h6>
        <hr>
        <div class="message-body">
            {{$data['message']->content}}
        </div>
        <hr>
        @if($data['message']->file)
        Συννημένο Αρχείο: <a
            href='/messages/{{$data['mode']}}/{{$data['message']->id}}/{{$data['message']->file->filepath}}'><i
                class="fa fa-download" aria-hidden="true"></i>{{$data['message']->file->filepath}}</a>
        @endif


    </div>
    @endsection
