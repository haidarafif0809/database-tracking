@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/bug/list') }}">Bug</a></li>
<li class="active">Deskripsi Bug</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $bug->judul }}  |  {{ $bug->aplikasi->nama_aplikasi }} | created at {{ $bug->created_at }} | status @if($bug->status_bug == 0) Not On-hold @elseif($bug->status_bug == 1) On-Hold @elseif($bug->status_bug == 2) Finish Debug @elseif($bug->status_bug == 3) Finish Testing @endif </h2>
</div>
<div class="panel-body">

{{ $bug->deskripsi }}

</div>
</div>

<!-- panel form komentar -->
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Komentar </h2>
</div>
<div class="panel-body">

{!! Form::open(['url' => route('komentar.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('bug._form_komentar')
{!! Form::close() !!}
</div>
</div>
<!--/ panel komentar -->
<!-- panel isi komentar -->
@foreach($komentar as $komentars)
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $komentars->user->name }} | created at {{ $komentars->created_at }} </h2>
</div>
<div class="panel-body">
{{ $komentars->komentar }}
</div>
</div>

@endforeach

<!--/ panel isi komentar -->
</div>
</div>
</div>
@endsection
