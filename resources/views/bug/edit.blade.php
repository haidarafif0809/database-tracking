@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/database') }}">Bug</a></li>
<li class="active">Ubah Aduan Bug</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah Aduan Bug</h2>
</div>
<div class="panel-body">
{!! Form::model($bug, ['url' => route('list.update', $bug->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('bug._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection