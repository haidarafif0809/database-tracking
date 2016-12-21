@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/admin/kategori-tugas') }}">Database</a></li>
<li><a href="{{ url('/admin/kategori-tugas') }}">Table</a></li>
<li><a href="{{ url('/admin/kategori-tugas') }}">Column</a></li>
<li class="active">Ubah Column</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Column</h2>
</div>
<div class="panel-body">
{!! Form::model($column, ['url' => route('column.update', $column->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('column._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection