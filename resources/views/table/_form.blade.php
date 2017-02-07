<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('nama_table', 'Nama Table', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_table', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_table', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('keterangan', 'Keterangan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
</div>
</div>
{!! Form::hidden('id_database', $value = $id_database, ['class'=>'form-control']) !!}

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
