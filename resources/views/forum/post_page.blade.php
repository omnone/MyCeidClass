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
                    Θέμα: "{{$data['subtitle']}}"
                </div>
                <div class="col-md-3">
                    <a class="button is-primary"
                        href="/lessons/{{$data['title']}}/forum/create/{{$data['anartisi']->sizitisi->id}}/{{$data['anartisi']->id}}">
                        Δημιουργία Απάντησης</a>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body ">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth is-post">
            <thead class="has-background-light ">
                <tr>
                    <th class="">Μέλος</th>
                    <th class="">Μήνυμα</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="from">
                        <figure class="image is-64x64">
                            @if($data['anartisi']->posted_by->profile_photo!==null)
                            <img class="is-rounded"
                                src={{url('/storage/profile_photos/'.$data['anartisi']->posted_by->profile_photo->filepath) }}>
                            @else
                            <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                            @endif
                        </figure>
                        <b>{{$data['anartisi']->posted_by->name}} {{$data['anartisi']->posted_by->surname}}</b>
                        <div class="smaller"></div>
                        <div class="smaller"></div>
                    </td>
                    <td class="message"><small class="text-muted"><b>Στάλθηκε:</b>
                            {{$data['anartisi']->created_at}}</small>
                        <hr>
                        {{$data['anartisi']->description}}
                    </td>

                </tr>

                @if(count($data['apantiseis']) > 0)
                @foreach ($data['apantiseis'] as $apantisi)
                <tr>
                    <td class="from">
                        <figure class="image is-64x64">
                            @if($apantisi->posted_by->profile_photo!==null)
                            <img class="is-rounded"
                                src={{url('/storage/profile_photos/'.$apantisi->posted_by->profile_photo->filepath) }}>
                            @else
                            <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png">
                            @endif
                        </figure>
                        <b>{{$apantisi->posted_by->name}} {{$apantisi->posted_by->surname}}</b>
                        <div class="smaller"></div>
                        <div class="smaller"></div>
                    </td>
                    <td class="message"><small class="text-muted"><b>Στάλθηκε:</b> {{$apantisi->created_at}}</small>
                        <hr>
                        {{$apantisi->description}}
                    </td>

                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
        {{$data['apantiseis']->links()}}
    </div>

</div>
@endsection
