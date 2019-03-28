@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h3>Your Blog Posts</h3>
                    <hr>
                    @if(count($posts)>0)
                        <table class="table table-striped">
                            <tr>
                                <td>Title</td>
                                <td></td>
                                <td></td>
                            </tr>

                            @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->title}}</th>
                                <td><a class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a></td>
                                <td>
                                    {!!Form::open(['action'=>['PostsContoller@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                </td>
                            </tr>

                            @endforeach
                        </table>
                        @else
                        <p>You don't have any posts.</p>
                        @endif
                        <hr>
                        <a href='/posts/create' class='btn btn-success'>Create Post</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
