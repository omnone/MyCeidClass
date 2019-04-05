@extends('layouts.app')
@section('content') {{-- titlos selidas --}}
    @include('layouts.sidebar-mathima')
<div class="card" id='whereami'>
    <h1 class="title">{{$data['lesson']->name}}</h1>
</div>

<br />

<div class="card">
    <div class="card-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="subtitle">{{$data['title']}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        {{-- <table class="table is-bordered is-striped is-narrow is-hoverable is-fullwidth">
            <thead class="has-background-light">
                <tr>
                    <th>Τύπος</th>
                    <th>Όνομα</th>
                    <th>Μέγεθος</th>
                    <th>Ημερομηνία</th>
                    <th><i class="fa fa-cogs" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>

                <tr class="visible">
                    <td class="text-center"><span class="fa fa-file-pdf-o"></span></td>
                    <td><input type="hidden" value="/modules/document/index.php?course=CEID1030&amp;download=/5c6fb6e1kRRi.pdf">
                        <a href="" class="fileURL fileModal" target="_blank" title="Διαφάνειες 1ης διάλεξης">Διαφάνειες 1ης διάλεξης</a>
                       <br>
                        <span class="comment text-muted"><small>Σημειώσεις για το μάθημα</small></span>
                    </td>
                    <td>6.84 MB</td>
                    <td title="22-02-2019 10:46:25">22-02-2019</td>
                    <td class="text-center"><a href="/modules/document/index.php?course=CEID1030&amp;download=/5c6fb6e1kRRi.pdf"><span class="fa fa-download" title="" data-toggle="tooltip" data-original-title="Αποθήκευση"></span></a></td>
                </tr>
            </tbody>
        </table> --}}
        {!!$data['table'] !!}
    </div>

</div>
@endsection
