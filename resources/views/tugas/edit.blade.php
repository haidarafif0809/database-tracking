@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
				<li><a href="{{ url('/home') }} ">Dashboard</a></li>
				<li><a href="{{ url('/tugas/data') }}">Tugas</a></li>
				<li class="active">Edit Tugas</li>
				</ul>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h2 class="panel-title">Edit Tugas</h2>
					</div>

					<div class="panel-body">
						{!! Form::model($tugas, ['url' => route('data.update', $tugas->id), 'method' => 'put', 'files'=>'true', 'class'=>'form-horizontal']) !!}
						@include('tugas._form')
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
	