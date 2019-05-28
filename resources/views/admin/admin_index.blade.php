@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
@include('layouts.admin-sidebar')
<div class="card" id='whereami'>
    Αρχική Σελίδα
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    Χρήστες
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
                    <th>Email</th>
                    <th>Όνομα</th>
                    <th>Επώνυμο</th>
                    <th>Ημ/νια Εγγραφής</th>
                    <th>Τελευταία Σύνδεση</th>
                    <th>IP Σύνδεσης</th>
                    <th>Ρόλος</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                {{-- @if(count($data['eksetaseis']) > 0) --}}
                @foreach ($data['students'] as $student)
                <tr>
                    <td>{{$student->email}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->surname}}</td>
                    <td>{{$student->created_at}}</td>
                    <td>
                        @if($student->last_login_at)
                        {{ \Carbon\Carbon::parse($student->last_login_at)->diffForHumans(\Carbon\Carbon::now()) }}
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($student->last_login_ip)
                        {{$student->last_login_ip}}
                        @else
                        -
                        @endif
                    </td>
                    <td>Φοιτητής</td>
                    <td><a href="" class="button is-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>
                @endforeach
                @foreach ($data['profs'] as $prof)
                <tr>
                    <td>{{$prof->email}}</td>
                    <td>{{$prof->name}}</td>
                    <td>{{$prof->surname}}</td>
                    <td>{{$prof->created_at}}</td>
                    <td>
                        @if($prof->last_login_at)
                        {{ \Carbon\Carbon::parse($prof->last_login_at)->diffForHumans(\Carbon\Carbon::now()) }}
                        @else
                        -
                        @endif
                    </td>
                    <td>
                        @if($prof->last_login_ip)
                        {{$prof->last_login_ip}}
                        @else
                        -
                        @endif
                    </td>
                    <td>Καθηγητής</td>
                    <td><a href="" class="button is-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                </tr>
                @endforeach
                {{-- @endif --}}
            </tbody>
        </table>
        {{-- {{$data['eksetaseis']->links()}} --}}
    </div> @endsection
