@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/database') }}">Database</a></li>
<li class="active">Ubah Database</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Database</h2>
</div>
<div class="panel-body">
{!! Form::model($database, ['url' => route('database.update', $database->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('database._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection