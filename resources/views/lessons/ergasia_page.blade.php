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
            </div>
        </div>
    </div>
    <div class="card-body">
        {{-- stoixeia ergasias --}}
        <div class="card">
            <div class="card-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9">
                            Στοχεία Εργασίας
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="columns is-0">
                    <div class="column is-4">
                        <ul>
                            <li>Όνομα:</li>
                            <li>Μάθημα:</li>
                            <li>Ημερομηνία Έναρξης:</li>
                            <li>Προθεσμία Υποβολής:</li>
                            <li>Βαθμός:</li>
                        </ul>
                    </div>
                    <div class="column is-4">
                        <ul>
                            <li>test</li>
                            <li>test</li>
                            <li>test</li>
                            <li>test</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
