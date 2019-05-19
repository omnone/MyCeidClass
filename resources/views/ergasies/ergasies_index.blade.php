@extends('layouts.app')
@section('content')
@if ($data['title'] != "Μαθήματα")
@include('layouts.sidebar-mathima')
@else
@include('layouts.sidebar-arxiki')
@endif
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
                    @if(Auth::user()->role =='prof')
                    <a class="button is-primary" href="/lessons/{{$data['title']}}/homework/create">
                        Δημιουργία Εργασίας</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if(Auth::user()->role =='student')
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Μάθημα</th>
                    <th class="">Τίτλος</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Έχει Αποσταλέι</th>
                    <th class="">Βαθμός</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($data['lessons']))
                @foreach($data['lessons'] as $lesson)
                @foreach($lesson->ergasies as $ergasia)
                <tr>
                    <td class=""><a href="/lessons/{{$lesson->name}}">{{$lesson->name}}</a></td>
                    <td class=""><a href="homework/{{$ergasia->id}}">{{$ergasia->title}}</a>
                    </td>
                    @if(Carbon\Carbon::today() > $ergasia->deadline)
                    <td class="">{{$ergasia->deadline}}<br><small>(<span class="text-danger">έχει λήξει</span>)</small>
                    </td>
                    @else
                    <td class="">{{$ergasia->deadline}}<br><small>(Απομένουν
                            {{ \Carbon\Carbon::parse($ergasia->deadline)->diff(\Carbon\Carbon::now())->days }} μέρες)
                    </td>
                    @endif

                    @if($ergasia->submittions->where('user_id',auth()->user()->id)->count() > 0)
                    <td class=""><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
                    <td width="30" align="center">
                        {{$ergasia->submittions->where('user_id',auth()->user()->id)->first()->grade}}</td>
                    @else
                    <td class=""><i class="fa fa-square-o" aria-hidden="true"></i></td>
                    <td>-</td>
                    @endif

                </tr>
                @endforeach
                @endforeach
                @else
                @foreach($data['lesson']->ergasies as $ergasia)
                <tr>
                    <td class=""><a href="/lessons/{{$data['lesson']->name}}">{{$data['lesson']->name}}</a></td>
                    <td class=""><a href="homework/{{$ergasia->id}}">{{$ergasia->title}}</a>
                    </td>
                    @if(Carbon\Carbon::today() > $ergasia->deadline)
                    <td class="">{{$ergasia->deadline}}<br><small>(<span class="text-danger">έχει λήξει</span>)</small>
                    </td>
                    @else
                    <td class="">{{$ergasia->deadline}}<br><small>(Απομένουν
                            {{ \Carbon\Carbon::parse($ergasia->deadline)->diff(\Carbon\Carbon::now())->days }} μέρες)
                    </td>
                    @endif

                    @if($ergasia->submittions->where('user_id',auth()->user()->id)->count() > 0)
                    <td class=""><i class="fa fa-check-square-o" aria-hidden="true"></i></td>
                    <td width="30" align="center">
                        {{$ergasia->submittions->where('user_id',auth()->user()->id)->first()->grade}}</td>
                    @else
                    <td class=""><i class="fa fa-square-o" aria-hidden="true"></i></td>
                    <td>-</td>
                    @endif

                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        @if(isset($data['lessons']))
        {{$data['lessons']->links()}}
        @endif
        @else
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th class="">Μάθημα</th>
                    <th class="">Τίτλος</th>
                    <th class="">Ημ/νια Δημιουργίας</th>
                    <th class="">Προθεσμία Υποβολής</th>
                    <th class="">Υποβολές</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($data['lessons']))
                @foreach($data['lessons'] as $lesson)
                @foreach($lesson->ergasies as $ergasia)
                <tr>
                    <td class=""><a href="/lessons/{{$lesson->name}}">{{$lesson->name}}</a></td>
                    <td class=""><a href="homework/{{$ergasia->id}}">{{$ergasia->title}}</a>
                    </td>
                    <td>{{$ergasia->created_at}}</td>
                    @if(Carbon\Carbon::today() > $ergasia->deadline)
                    <td class="">{{$ergasia->deadline}}<br><small>(<span class="text-danger">έχει λήξει</span>)</small>
                    </td>
                    @else
                    <td class="">{{$ergasia->deadline}}<br><small>(Απομένουν
                            {{ \Carbon\Carbon::parse($ergasia->deadline)->diff(\Carbon\Carbon::now())->days }} μέρες)
                    </td>
                    @endif
                    <td>{{$ergasia->submittions->count()}}</td>

                </tr>
                @endforeach
                @endforeach
                @else
                @foreach($data['lesson']->ergasies as $ergasia)
                <tr>
                    <td class=""><a href="/lessons/{{$data['lesson']->name}}">{{$data['lesson']->name}}</a></td>
                    <td class=""><a href="homework/{{$ergasia->id}}">{{$ergasia->title}}</a>
                    </td>
                    <td>{{$ergasia->created_at}}</td>
                    @if(Carbon\Carbon::today() > $ergasia->deadline)
                    <td class="">{{$ergasia->deadline}}<br><small>(<span class="text-danger">έχει λήξει</span>)</small>
                    </td>
                    @else
                    <td class="">{{$ergasia->deadline}}<br><small>(Απομένουν
                            {{ \Carbon\Carbon::parse($ergasia->deadline)->diff(\Carbon\Carbon::now())->days }} μέρες)
                    </td>
                    @endif
                    <td>{{$ergasia->submittions->count()}}</td>

                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        @endif


    </div>
    @endsection
