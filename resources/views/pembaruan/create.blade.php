@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }} ">Dashboard</a></li>
				<li><a href="{{ url('/tracking/pembaruan') }}">Pembaruan</a></li>
				<li class="active">Tambah Pembaruan</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Tambah Pembaruan</h2>
					</div>

					<div class="panel-body">
					{!! Form::open(['url' => route('pembaruan.store'),'method' => 'post','files'=>'true', 'class'=>'form-horizontal']) !!}
					@include('pembaruan._form')
					{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
