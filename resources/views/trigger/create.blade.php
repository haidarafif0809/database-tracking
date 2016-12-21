
@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/trigger') }}/{!! $id_database!!}">Trigger</a></li>
<li class="active">Tambah Trigger</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Trigger</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('trigger.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('trigger._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
