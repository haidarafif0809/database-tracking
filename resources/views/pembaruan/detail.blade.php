@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }} ">Dashboard</a></li>
<li><a href="{{ url('/tracking/pembaruan/') }}">pembaruan</a></li>
<li class="active">Deskripsi pembaruan</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $pembaruan->judul }}  |  {{ $pembaruan->aplikasi->nama_aplikasi }} | created at {{ $pembaruan->created_at }}</h2>
</div>
<div class="panel-body">

<p>Pemasalahan :</p> {{ $pembaruan->pemasalahan }} <br><br>
<p>Pemecahan :</p> {{ $pembaruan->pemecahan }}
@if (isset($pembaruan) && $pembaruan->foto)
<p><br>
	{!! Html::image(asset('foto/'.$pembaruan->foto), null, ['class'=>'img-rounded img responsive','style'=>'width:50%;']) !!}
</p>
@endif
</div>
</div>

<!-- panel form detail -->
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">Komentar </h2>
</div>
<div class="panel-body">

{!! Form::open(['url' => route('detail.store'),
'method' => 'post', 'class'=>'form-horizontal']) !!}
@include('pembaruan._form_detail')
{!! Form::close() !!}
</div>
</div>
<!--/ panel detail -->
<!-- panel isi detail -->
@foreach($detail as $details)
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title">{{ $details->user->name }} | created at {{ $details->created_at }} </h2>
</div>
<div class="panel-body">
{{ $details->detail }}
</div>
</div>

@endforeach

<!--/ panel isi detail -->
</div>
</div>
</div>
@endsection
