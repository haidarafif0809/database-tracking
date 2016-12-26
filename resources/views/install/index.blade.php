@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Install Aplikasi</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Install Aplikasi</h2>
</div>
<div class="panel-body">
<p> <a class="btn btn-primary" href="{{ route('install-aplikasi.create') }}">Install</a> </p>

{!! $html->table(['class'=>'table-striped table']) !!}

</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
