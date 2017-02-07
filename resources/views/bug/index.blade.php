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
<h2 class="panel-title">Bug & Request</h2>
</div>
<div class="panel-body">
<a class="btn btn-primary" href="{{ route('list.create') }}">Tambah</a> 


 <div class="btn-group">
  <button type="button" class="btn btn-primary">Status Bug & Request</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
    <li><a href="{{ url('/bug/list') }}">All</a></li>
    <li><a href="{{ route('bug.status',0) }}">Not On-Hold / Still has Bugs</a></li>
    <li><a href="{{ route('bug.status',1) }}">On-Hold</a></li>
     <li><a href="{{ route('bug.status',2) }}">Finisih Debug</a></li>
      <li><a href="{{ route('bug.status',3) }}">Finish Testing</a></li>
  </ul>
</div>

<div class="btn-group">
  <button type="button" class="btn btn-primary">Aplikasi</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  @foreach($aplikasi as $aplikasis)
    <li><a href="{{ route('bug.aplikasi',$aplikasis->id) }}">{{ $aplikasis->nama_aplikasi }}</a></li>
@endforeach
  </ul>
</div>


<div class="btn-group">
  <button type="button" class="btn btn-primary">Pelapor</button>
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" role="menu">
  @foreach($user as $users)
    <li><a href="{{ route('bug.pelapor',$users->id) }}">{{ $users->name }}</a></li>
@endforeach
  </ul>
</div>


<br>
<br>

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
