@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li class="active">Bug</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Bug</h2>
</div>
<div class="panel-body">
<p> <a class="btn btn-primary" href="{{ route('list.create') }}">Tambah</a> </p>

{!! $html->table(['class'=>'table-striped table']) !!}


<h4 style="color:red">*Untuk screenshot gunakan aplikasi lighshot , lalu pilih upload ke server , lalu copy link nya ke deskripsi aduan</h4>

</div>
</div>
</div>
</div>
</div>
@endsection

@section('scripts')
{!! $html->scripts() !!}
@endsection
