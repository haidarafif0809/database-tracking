@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Tugas</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tugas</h2>
</div>
<div class="panel-body">
<a class="btn btn-primary" href="{{ route('data.create') }}">Tambah</a> 



<br>
<br>

{!! $html->table(['class'=>'table-striped table']) !!}


</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
