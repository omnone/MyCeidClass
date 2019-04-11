@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@if ($data['title'] != "Μαθήματα")
    @include('layouts.sidebar-mathima')
@else
    @include('layouts.sidebar-arxiki')
@endif
<div class="card " id='whereami'>
    {{$data['title']}}
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                     <span class="animated fadeInUp">{{$data['subtitle']}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {!!$data['table'] !!}
    </div>

</div>
@endsection
