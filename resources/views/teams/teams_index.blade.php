@extends('layouts.app')
@section('content') {{-- titlos selidas --}} @if ($data['title'] != "Μαθήματα")
@include('layouts.sidebar-mathima')
@else
@include('layouts.sidebar-arxiki') @endif
<div class="card" id='whereami'>
    {{$data['title']}}
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{$data['subtitle']}}
                </div>
                <div class="col-md-3">
                    <a class="button is-primary" href="/lessons/{{$data['title']}}/groups/create">
                        Δημιουργία Ομάδας</a>

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Όνομα Ομάδας</th>
                    <th>Περιγραφή</th>
                    <th>Μέλη</th>
                    <th>Μέγεθος</th>
                    <th>Εγγραφή</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['teams']) > 0)
                @foreach ($data['teams'] as $team)
                <tr>
                    <td class=""><a href="/lessons/{{$data['title']}}/groups/{{$team->id}}">
                            <b>{{$team->name}}</b>
                        </a>
                        <div class="smaller">{{$team->created_at}}</div>
                    </td>
                    <td class="">{{$team->description}}</td>
                    <td class="">{{$team->members->count()}}</td>
                    <td class="">{{$team->members_limit}}</td>
                    <td>
                        {!! Form::open(['action' => ['OmadesController@subscribe_to_group',$data['title'],$team->id],
                        'method' =>
                        'POST',]) !!}
                        {{ Form::hidden('mode', 'subscribe') }}
                        <button class="button is-success">
                            <span>Εγγραφή</span>
                            <span class="icon is-small">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </span>
                        </button>
                        {!! Form::close() !!}
                    </td>

                </tr>
                @endforeach

                @endif


            </tbody>
        </table>
        {{$data['teams']->links()}}


    </div>
    @endsection
