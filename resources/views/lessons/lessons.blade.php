@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
    @include('layouts.sidebar-arxiki')
<div class="card" id='whereami'>
    {{$data['title']}}
</div>
</br>

@if(Auth::user()->role =='student')
<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{$data['subtitle']}}

                </div>

                {{-- search a lesson box - add a form --}}
                <div class="col-md-3 is-pulled-right">
                    {!! Form::open(array('method' => 'Get', 'route' => array('lessons.search_result'))) !!}
                    <div class="field has-addons ">
                        <div class="control">
                            {!! Form::text('searchlesson',null,['id' => 'searchBox','class'=>'input','placeholder'=>"Αναζήτηση Μαθήματος"]) !!}
                        </div>
                        <div class="control">
                            <button class='button is-primary'>Αναζήτηση</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                {{-- --- --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead>
                <tr>
                    <th scope="col">Μάθημα</th>
                    <th scope="col">Εξάμηνο</th>
                    <th scope="col">Περίοδος</th>
                    <th scope="col">Υπεύθυνος</th>
                    @if($data['subtitle'] != 'Τα μαθήματα μου')
                    <th scope="col">Εγγεγραμμένοι</th>
                    @else
                    <th scope="col">Ημ/νια Εγγραφής</th>
                    @endif

                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data['lessons'] as $lesson)
                <tr>
                    <th scope="row"><a href="/lessons/{{$lesson->name}}">{{$lesson->name}}<a></th>
                                        <td>{{$lesson->eksamino}}</td>
                                        <td>{{$lesson->periodos}}</td>
                                        <td>{{$lesson->teacher->surname}} {{$lesson->teacher->name}}</td>
                                        {{-- ola ta mathimata page --}}
                                       @if($data['subtitle'] != 'Τα μαθήματα μου')
                                            <td>{{count($lesson->subscribers)}}</td>
                                            <td>
                                                @if($data['subscriptions']->contains('id', $lesson->id))
                                                {!! Form::open(array('method' => 'Post', 'route' => array('lessons.subscribe_to_lesson'))) !!}
                                                {{ Form::hidden('lesson_id', $lesson->id) }}
                                                {{ Form::hidden('mode', 'unsubscribe') }}
                                                <button class="button is-danger ">
                                                    <span>Απεγγραφή</span>
                                                    <span class="icon is-small">
                                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                                @else
                                                {!! Form::open(array('method' => 'Post', 'route' => array('lessons.subscribe_to_lesson'))) !!}
                                                {{ Form::hidden('lesson_id', $lesson->id) }}
                                                {{ Form::hidden('mode', 'subscribe') }}
                                                <button class="button is-success">
                                                    <span>Εγγραφή</span>
                                                    <span class="icon is-small">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                                @endif
                                            </td>
                                            {{-- ta mathimata mou --}}
                                            @else
                                                <td>{{$lesson->created_at->diffForHumans()}}</td>
                                                <td>
                                                {!! Form::open(array('method' => 'Post', 'route' => array('lessons.subscribe_to_lesson'))) !!}
                                                {{ Form::hidden('lesson_id', $lesson->id) }}
                                                {{ Form::hidden('mode', 'unsubscribe') }}
                                                <button class="button is-danger ">
                                                    <span>Απεγγραφή</span>
                                                    <span class="icon is-small">
                                                    <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                                    </span>
                                                </button>
                                                {!! Form::close() !!}
                                            </td>
                                            @endif

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else {{-- kathigitis------------------------------------------------------------------------------------------------------------
--}}
<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    {{$data['subtitle']}}
                 </div>

                {{-- search a lesson box - add a form --}}
                <div class="col-md-3 is-pulled-right">
                    <div class="field has-addons ">
                        <div class="control">
                            <input class="input" type="text" placeholder="Αναζήτηση Μαθήματος">
                        </div>
                        <div class="control">
                            <a class="button is-primary">
                                  Αναζήτηση
                                </a>
    </div>
</div>
</div>
{{-- --- --}}
</div>
</div>
</div>
<div class="card-body">
    <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th scope="col">Όνομα</th>
                <th scope="col">Εξάμηνο</th>
                <th scope="col">Περίοδος</th>
                <th scope="col">Εγγεγραμμένοι</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['lessons'] as $lesson)
            <tr>
                <th scope="row"><a href="/">{{$lesson->name}}<a></th>
                                                    <td>{{$lesson->eksamino}}</td>
                                                    <td>{{$lesson->periodos}}</td>
                                                    <td>{{count($lesson->subscribers)}}</td>
                                                    <td><button class="button is-danger ">
                                            <span>Διαγραφή</span>
                                            <span class="icon is-small">
                                             <i class="fa fa-minus-circle" aria-hidden="true"></i>
                                            </span>
                                        </button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
@endsection
