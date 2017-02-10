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

<div class="btn-group">
  <button type="button" class="btn btn-primary">Status Tugas & Request</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ url('/tugas/data') }}">All</a></li>
    <li><a href="{{ route('tugas.status',0) }}">Belum DI Kerjakan</a></li>
    <li><a href="{{ route('tugas.status',1) }}">Sedang Di Kerjakan</a></li>
     <li><a href="{{ route('tugas.status',3) }}">Sudah Di Kerjakan</a></li>
      <li><a href="{{ route('tugas.status',2) }}">Konfirmasi Tugas</a></li>
  </ul>
</div>

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
