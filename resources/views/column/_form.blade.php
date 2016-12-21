<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('nama_column', 'Nama Column', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_column', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_column', '<p class="help-block">:message</p>') !!}
</div>
</div>
<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('length', 'Lenghth', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('length', null, ['class'=>'form-control']) !!}
{!! $errors->first('length', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('tipe_data', 'Tipe Data', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('tipe_data', array('integer' => 'integer', 'varchar' => 'String','date' => 'date','datetime' => 'datetime','text' => 'text'),null,array('class' => 'form-control')) !!}
{!! $errors->first('tipe_data', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('status_null', 'Status Null', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('status_null', array('1' => 'True', '0' => 'False'),null,array('class' => 'form-control')) !!}
{!! $errors->first('status_null', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('status_unique', 'Status unique', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('status_unique', array('1' => 'True', '0' => 'False'),null,array('class' => 'form-control')) !!}
{!! $errors->first('status_unique', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('status_increment', 'Status increment', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('status_increment', array('1' => 'True', '0' => 'False'),null,array('class' => 'form-control')) !!}
{!! $errors->first('status_increment', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('keterangan', 'Keterangan', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('keterangan', null, ['class'=>'form-control']) !!}
{!! $errors->first('keterangan', '<p class="help-block">:message</p>') !!}
</div>
</div>
{!! Form::hidden('id_table', $value = $id_table, ['class'=>'form-control']) !!}

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
