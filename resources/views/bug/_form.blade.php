<div class="form-group {!! $errors->has('aplikasi_id') ? 'has-error' : '' !!}">
{!! Form::label('aplikasi_id', 'Aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('aplikasi_id',$aplikasi, null,  array('class' => 'form-control')) !!}

{!! $errors->first('aplikasi_id', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{ $errors->has('judul') ? ' has-error' : '' }}">
{!! Form::label('judul', 'Judul', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('judul', null, ['class'=>'form-control']) !!}
{!! $errors->first('judul', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('deskripsi', 'deskripsi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('deskripsi', null, ['class'=>'form-control']) !!}
{!! $errors->first('deskripsi', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
