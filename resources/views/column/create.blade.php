@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/table') }}">Table</a></li>
<li><a href="{{ url('/tracking/column/') }}/{!! $id_table !!}">Column</a></li>
<li class="active">Tambah Column</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Column</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('column.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('column._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
