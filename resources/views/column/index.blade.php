@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li ><a href="{{ url('/tracking/database/') }}">Database {{ $nama_database}}</a></li>
<li ><a href="{{ url('/tracking/table/') }}/{!! $id_database !!}">Table {{ $nama_table }}</a></li>
<li class="active">Column {{ $nama_table}}</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Column Di {{ $nama_table}}</h2>
</div>
<div class="panel-body">
<p> <a class="btn btn-primary" href="{{ route('column.create') }}/{!! $id_table !!}">Tambah</a> </p>

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
