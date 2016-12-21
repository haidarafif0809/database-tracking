@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/database') }}">Database</a></li>
<li><a href="{{ url('/tracking/table') }}/{{ $table->id_database}}">Table</a></li>
<li class="active">Ubah Table</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Table</h2>
</div>
<div class="panel-body">
{!! Form::model($table, ['url' => route('table.update', $table->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('table._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection