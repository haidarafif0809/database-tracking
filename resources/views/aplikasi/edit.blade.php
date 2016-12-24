@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li><a href="{{ url('/tracking/database') }}">aplikasi</a></li>
<li class="active">Ubah aplikasi</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Ubah aplikasi</h2>
</div>
<div class="panel-body">
{!! Form::model($aplikasi, ['url' => route('aplikasi.update', $aplikasi->id),
'method'=>'put', 'class'=>'form-horizontal']) !!}
@include('aplikasi._form')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection