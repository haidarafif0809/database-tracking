@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tugas/data/') }}">tugas</a></li>
<li class="active">Komentar Tugas</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $tugas->judul }} | created at {{ $tugas->created_at }}</h2>
</div>
<div class="panel-body">

<p>Nama Petugas : {{ $tugas->user->name }} </p> 
<p>Judul Tugas  : {{ $tugas->judul }} </p> 
<p>Deadline     : {{ $tugas->deadline }}</p>
<p>Waktu Selesai     : {{ $tugas->waktu_selesai }}  </p>
<p>Deskripsi    : {{ $tugas->deskripsi }}  </p> 
@if (isset($tugas) && $tugas->foto_tugas)
<p><br>
	{!! Html::image(asset('foto_tugas/'.$tugas->foto_tugas), null, ['class'=>'img-rounded img responsive','style'=>'width:50%;']) !!}
</p>
@endif
</div>
</div>

<!-- panel form komen -->
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Komentar </h2>
</div>
<div class="panel-body">

{!! Form::open(['url' => route('komen.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('tugas._form_komen')
{!! Form::close() !!}
</div>
</div>
<!--/ panel komen -->
<!-- panel isi komen -->
@foreach($komen as $komens)
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $komens->user->name }} | created at {{ $komens->created_at }} </h2>
</div>
<div class="panel-body">
{{ $komens->komentar }}
</div>
</div>

@endforeach

<!--/ panel isi komen -->
</div>
</div>
</div>
@endsection
