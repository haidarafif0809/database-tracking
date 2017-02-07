<div class="form-group{{ $errors->has('id_aplikasi') ? ' has-error' : '' }}">
{!! Form::label('id_aplikasi', 'Aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('id_aplikasi',[]+App\Aplikasi::pluck('nama_aplikasi','id')->all(),null,['class'=>'form-control']) !!}
{!! $errors->first('id_aplikasi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
{!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('judul', null, ['class'=>'form-control']) !!}
{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('pemasalahan') ? ' has-error' : '' }}">
{!! Form::label('pemasalahan', 'Pemasalahan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('pemasalahan', null, ['class'=>'form-control']) !!}
{!! $errors->first('pemasalahan', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('pemecahan') ? ' has-error' : '' }}">
{!! Form::label('pemecahan', 'Pemecahan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('pemecahan', null, ['class'=>'form-control']) !!}
{!! $errors->first('pemecahan', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('foto') ? ' has-error' : '' }}">
{!! Form::label('foto', 'Foto', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::file('foto') !!}
@if (isset($pembaruans) && $pembaruans->foto)
<p><br>
	{!! Html::image(asset('foto/'.$pembaruans->foto), null, ['class'=>'img-rounded img responsive','style'=>'width:70%;']) !!}
</p>
@endif
{!! $errors->first('foto', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
