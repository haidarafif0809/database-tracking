<div class="form-group{{ $errors->has('nama_database') ? ' has-error' : '' }}">
{!! Form::label('nama_database', 'Nama Database', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_database', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_database', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
{!! Form::label('keterangan', 'Keterangan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
