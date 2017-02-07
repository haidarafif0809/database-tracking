<div class="form-group{{ $errors->has('sample_data') ? ' has-error' : '' }}">
{!! Form::label('sample_data', 'Sample Data (file.sql)', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::file('sample_data') !!}
{!! $errors->first('sample_data', '<p class="help-block">:message</p>') !!}
</div>
</div>

{!! Form::hidden('id_database', $value = $id_database, ['class'=>'form-control']) !!}

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>

