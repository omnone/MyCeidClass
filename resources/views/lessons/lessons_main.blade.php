@extends('layouts.app')
@section('content') {{-- titlos selidas --}} @if ($data['title'] != "Μαθήματα")
    @include('layouts.sidebar-mathima')
@else
    @include('layouts.sidebar-arxiki') @endif
<div class="card" id='whereami'>
    <h1 class="subtitle">{{$data['title']}}</h1>
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="subtitle">{{$data['subtitle']}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!!$data['table'] !!}
    </div>

</div>
@endsection
