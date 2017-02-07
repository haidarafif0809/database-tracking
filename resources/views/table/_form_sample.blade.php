
@foreach($column as $columns)
<div class="form-group{{ $errors->has($columns->nama_column) ? ' has-error' : '' }}">
{!! Form::label($columns->nama_column, $columns->nama_column, ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text($columns->nama_column, null, ['class'=>'form-control']) !!}
{!! $errors->first($columns->nama_column, '<p class="help-block">:message</p>') !!}
</div>
</div>
@endforeach

{!! Form::hidden('id_database', $value = $id_database, ['class'=>'form-control']) !!}

{!! Form::hidden('id_table', $value = $id_table, ['class'=>'form-control']) !!}

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
