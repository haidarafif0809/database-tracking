@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/bug/list') }}">Bug</a></li>
<li class="active">Tambah Bug</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Tambah Bug</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('list.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('bug._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection