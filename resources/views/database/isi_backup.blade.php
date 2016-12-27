@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/database/backup') }}">Backup</a></li>
<li class="active">Isi backup</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Isi backup</h2>
</div>
<div class="panel-body">
{{ $isi_backup }}
</div>
</div>
</div>
</div>
</div>
@endsection
