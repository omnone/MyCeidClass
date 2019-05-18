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
    <div class="card-body">

        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                    <th>Θέμα</th>
                    @if($data['mode']=='inbox')
                    <th>Από</th>
                    @else
                    <th>Προς</th>
                    @endif
                    <th>Ημ/νια Αποστολής</th>
                </tr>
            </thead>
            <tbody>
                @if($data['mode']=='send')
                @if(count($data['send_messages']) > 0)

                @foreach ($data['send_messages'] as $message)
                <tr>
                    <td>-</td>
                    <td><a href="/messages/{{$data['mode']}}/{{$message->id}}">{{$message->title}}</a></td>
                    <td>{{$message->receiver->name}} {{$message->receiver->surname}}</td>
                    <td>{{$message->created_at}}</td>


        </div>
        </td>
        </tr>
        @endforeach
        @endif
    @else
    @if(count($data['inbox_messages']) > 0)

    @foreach ($data['inbox_messages'] as $message)
    @if($message->seen == false)
    <tr class="has-text-centered" style="font-weight: 800;">
        <td><i class="fa fa-star" aria-hidden="true" style="color:#e4cc01"></i></td>
        @else
    <tr class="has-text-centered">
        <td>-</td>
        @endif
        <td><a href="/messages/{{$data['mode']}}/{{$message->id}}">{{$message->title}}</a></td>
        <td>{{$message->sender->name}} {{$message->sender->surname}}</td>
        <td>{{$message->created_at}}</td>


</div>
</td>
</tr>
@endforeach
@endif
@endif



</tbody>

</table>
@if($data['mode']=='send')
{{$data['send_messages']->links()}}
@else
{{$data['inbox_messages']->links()}}
@endif
</div>
@endsection
