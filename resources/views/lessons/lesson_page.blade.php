@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
    @include('layouts.sidebar-mathima')
<div class="card" id='whereami'>
    <h1 class="title">{{$data['lesson']->name}}</h1>
    <h2 class="subtitle">{{$data['lesson']->teacher->surname}} {{$data['lesson']->teacher->name}}</h2>
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    Περιγραφή
                </div>

                {{-- search a lesson box - add a form --}} @if(count($data['has_sub'])<1)
                <div class="col-md-3 is-pulled-right">
                   {!! Form::open(array('method' => 'Post', 'route' => array('lessons.subscribe_to_lesson'))) !!}
                   {{ Form::hidden('lesson_id',$data['lesson']->id) }}
                   {{ Form::hidden('mode', 'subscribe') }}
                    <div class="field has-addons ">
                        <div class="control">
                            <button class='button is-primary'>Εγγραφή</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                @endif {{-- --- --}}
            </div>
        </div>
    </div>
    <div class="card-body">
        {{$data['lesson']->description}}
    </div>

</div>
@endsection
