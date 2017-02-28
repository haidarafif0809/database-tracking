<div class="form-group{{ $errors->has('id_petugas') ? ' has-error' : '' }}">
{!! Form::label('id_petugas', 'Nama Petugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('id_petugas',[]+App\User::pluck('name','id')->all(),null,['class'=>'form-control']) !!}
{!! $errors->first('id_petugas', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
{!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('judul', null, ['class'=>'form-control']) !!}
{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('deadline') ? ' has-error' : '' }}">
{!! Form::label('deadline', 'Deadline', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('deadline', null, ['class'=>'form-control datepicker', 'data-date-format'=>'yyyy/mm/dd']) !!}
{!! $errors->first('deadline', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('deskripsi') ? ' has-error' : '' }}">
{!! Form::label('deskripsi', 'Deskripsi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('deskripsi', null, ['class'=>'form-control']) !!}
{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('foto_tugas') ? ' has-error' : '' }}">
{!! Form::label('foto_tugas', 'Foto Tugas', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::file('foto_tugas') !!}
@if (isset($tugas) && $tugas->foto_tugas)
<p><br>
	{!! Html::image(asset('foto_tugas/'.$tugas->foto_tugas), null, ['class'=>'img-rounded img responsive','style'=>'width:70%;']) !!}
</p>
@endif
{!! $errors->first('foto_tugas', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>