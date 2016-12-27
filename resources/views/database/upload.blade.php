@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/database') }}">Database</a></li>
<li class="active">Upload Sample Data</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Upload Sample Data</h2>
</div>
<div class="panel-body">
{!! Form::open(['url' => route('database.upload-proses'),
'method' => 'post', 'files'=>'true', 'class'=>'form-horizontal']) !!}
@include('database._form_upload')
{!! Form::close() !!}

</div>
</div>
</div>
</div>
</div>
@endsection
