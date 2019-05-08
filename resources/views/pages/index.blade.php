@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
    @include('layouts.sidebar-arxiki')
<div class="card" id='whereami'>
    Αρχική Σελίδα
</div>

<br /> {{-- foititis----------------------------------------------------------------------------------------------------------
--}} @if(Auth::user()->role =='student')
<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7">
                    Τα μαθήματά μου
                </div>

                {{-- search a lesson box - add a form --}}
                <div class="col-md-5 is-pulled-right">
                    {!! Form::open(array('method' => 'Get', 'route' => array('lessons.search_result'))) !!}
                    <div class="field has-addons ">
                        <div class="control">
                            {{-- <input class="form-control" type="text" name='searchlesson' id="searchBox" placeholder="Αναζήτηση Μαθήματος">                            --}} {!! Form::text('searchlesson',null,['id' => 'searchBox','class'=>'input','placeholder'=>"Αναζήτηση
                            Μαθήματος"]) !!}
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
            <thead class="has-background-light">
                <tr>
                    <th scope="col">Μάθημα</th>
                    <th scope="col">Εξάμηνο</th>
                    <th scope="col">Υπεύθυνος</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if($lessons->count() >=1)
                @foreach ($lessons as $lesson)
                <tr>
                    <th scope="row"><a href="/lessons/{{$lesson->name}}">{{$lesson->name}}<a></th>
                                        <td>{{$lesson->eksamino}}</td>
                                        <td>{{$lesson->teacher->surname}} {{$lesson->teacher->name}}</td>
                                        <td><a href="/lessons/{{$lesson->name}}"><i class="fa fa-sign-in" aria-hidden="true"></i></a></td>
                </tr>
                @endforeach
                @endif
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
                    Τα μαθήματα μου
                </div>

               {{-- search a lesson box - add a form --}}
                <div class="col-md-3 is-pulled-right">
                    {!! Form::open(array('method' => 'Get', 'route' => array('lessons.search_result'))) !!}
                    <div class="field has-addons ">
                        <div class="control">
                            {{-- <input class="form-control" type="text" name='searchlesson' id="searchBox" placeholder="Αναζήτηση Μαθήματος">                            --}}
                            {!! Form::text('searchlesson',null,['id' => 'searchBox','class'=>'input','placeholder'=>"Αναζήτηση
                            Μαθήματος"]) !!}
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
            <thead class="has-background-light">
                <tr>
                    <th scope="col">Όνομα</th>
                    <th scope="col">Εξάμηνο</th>
                    <th scope="col">Περίοδος</th>
                    <th scope="col">Εγγεγραμμένοι</th>
                </tr>
            </thead>
            <tbody>
                @isset($lessons) @foreach ($lessons as $lesson)
                <tr>
                    <th scope="row"><a href="/lessons/{{$lesson->name}}">{{$lesson->name}}<a></th>
                                                    <td>{{$lesson->eksamino}}</td>
                                                    <td>{{$lesson->periodos}}</td>
                                                    <td>{{count($lesson->subscribers)}}</td>
                </tr>
                @endforeach
                @endisset
            </tbody>
        </table>
    </div>
</div>
@endif

<br />
{{-- foititis---------------------------------------------------------------------------------------------------------- --}}
@if(Auth::user()->role =='student')
<div class="card">
    <div class="card-header">
        Ανακοινώσεις
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th scope="col">Μάθημα</th>
                    <th scope="col">Θέμα</th>
                    <th scope="col">Ημερομηνία</th>
                    <th scope="col">Από</th>
                </tr>
            </thead>
            <tbody>
                    @if($lessons->count() >=1)
                    <tr>
                    <td scope="row"><a href="/lessons/{{$lesson->name}}">Τεχνολογία Λογισμικού</a></td>
                    <td>Παράδοση Εργασίων Εξαμήνου</td>
                    <td>12-09-2019</td>
                    <td>Ξοε Ντοε</td>
                </tr>
                @endif

            </tbody>
        </table>
    </div>
</div>
{{-- kathigitis------------------------------------------------------------------------------------------------------------
--}} @else
<div class="card">
    <div class="card-header">
        Μηνύματα Forum
    </div>
    <div class="card-body">
        <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th scope="col">Μάθημα</th>
                    <th scope="col">Θέμα</th>
                    <th scope="col">Ημερομηνία</th>
                    <th scope="col">Από</th>
                    <th scope="col">Απαντήσεις</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><a href="/lessons/{{$lesson->name}}">Τεχνολογία Λογισμικού</a></th>
                    <td>Παράδοση Εργασίων Εξαμήνου</td>
                    <td>12-09-2019</td>
                    <td>Ξοε Ντοε</td>
                    <td>12</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endif

<br /> {{-- </div> --}}

</div>
</div>
@endsection
