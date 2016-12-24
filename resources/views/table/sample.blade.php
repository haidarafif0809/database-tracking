@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/table') }}">Table</a></li>
<li class="active">Buat Sample Data</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"> Buat Sample Data</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('table.tambah_sample'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('table._form_sample')
{!! Form::close() !!}
</div>
</div>
</div>
</div>
</div>
@endsection
