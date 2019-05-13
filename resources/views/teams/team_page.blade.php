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
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Μέλος</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @if(count($data['group']->members) > 0)
                @foreach ($data['group']->members as $member)
                <tr>
                    <td>
                        <figure class="image is-64x64">
                            @if($member->profile_photo!==null)
                            <img class="is-rounded"
                                src={{url('/storage/profile_photos/'.$member->profile_photo->filepath) }}>
                            @else
                            <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                            @endif
                        </figure>
                        <b>{{$member->name}} {{$member->surname}}</b>
                    </td>
                    <td class="">{{$member->email}}</td>

                </tr>
                @endforeach

                @endif


            </tbody>
        </table>


    </div>
</div>
</div>
</div>
@endsection
