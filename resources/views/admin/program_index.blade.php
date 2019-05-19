@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@if(Auth::user()->role == 'admin')
@include('layouts.admin-sidebar')
@else
@include('layouts.sidebar-arxiki')
@endif
<div class="card" id='whereami'>
    Εβδομαδιαίο Πρόγραμμα
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    @if(Auth::user()->role == 'admin')
                    <button href="/admin/schedule/create" class="button is-primary" id="">Επεξεργασία</button>
                    @endif
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th></th>
                    <th>Δευτέρα</th>
                    <th>Τρίτη</th>
                    <th>Τετάρτη</th>
                    <th>Πέμπτη</th>
                    <th>Παρασκευή</th>
                </tr>
            </thead>
            <tbody>
                {{-- @if(count($data['eksetaseis']) > 0) --}}
                @foreach ($data['hours'] as $hour)
                <tr>
                    <td>{{$hour}}</td>
                    <td>
                        @foreach($data['deutera'] as $paradosi)
                        @if($paradosi->hour == $hour)
                        <small> {{$paradosi->lesson->name}}({{$paradosi->room->name}})</small>
                        <hr>
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($data['triti'] as $paradosi)
                        @if($paradosi->hour == $hour)
                        <small> {{$paradosi->lesson->name}}({{$paradosi->room->name}})</small>
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($data['tetarti'] as $paradosi)
                        @if($paradosi->hour == $hour)
                        <small> {{$paradosi->lesson->name}}({{$paradosi->room->name}})</small>
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($data['pempti'] as $paradosi)
                        @if($paradosi->hour == $hour)
                        <small> {{$paradosi->lesson->name}}({{$paradosi->room->name}})</small>
                        @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($data['paraskeui'] as $paradosi)
                        @if($paradosi->hour == $hour)
                        <small> {{$paradosi->lesson->name}}({{$paradosi->room->name}})</small>
                        @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
                {{-- @endif --}}
            </tbody>
        </table>
        {{-- {{$data['eksetaseis']->links()}} --}}
    </div> @endsection
