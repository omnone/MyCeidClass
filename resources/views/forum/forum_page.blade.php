@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.sidebar-mathima')
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
                    <th class="">Συζήτηση</th>
                    <th class="">Περιγραφή</th>
                    <th class="">Αναρτήσεις</th>
                    <th class="">Τελευταία ανάρτηση</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['sizitiseis'] as $sizitisi)
                <tr>
                    <td class=""><a href="/lessons/{{$data['title']}}/forum/{{$sizitisi->id}}">
                            <b>{{$sizitisi->title}}</b>
                        </a>
                        <div class="smaller">{{$sizitisi->created_at}}</div>
                        <div class="smaller"></div>
                    </td>
                    <td class="">{{$sizitisi->description}}</td>
                    <td class="">{{$sizitisi->anartiseis->count()}}</td>
                    <td class=""><span class="smaller">
                            @if($sizitisi->latest_post)
                            {{$sizitisi->latest_post->posted_by->surname}}
                            {{$sizitisi->latest_post->posted_by->name}}&nbsp;
                            <a href=""><span class="fa fa-comment-o" title=""
                                    data-original-title="Τελευταία ανάρτηση"></span></a>
                            <br>{{$sizitisi->latest_post->created_at}}</span>
                        @else
                        Δεν υπάρχουν αναρτήσεις.
                        @endif
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection
