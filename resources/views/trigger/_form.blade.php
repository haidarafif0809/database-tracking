<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('nama_trigger', 'Nama Trigger', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_trigger', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_trigger', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group {!! $errors->has('id_table') ? 'has-error' : '' !!}">
{!! Form::label('id_table', 'Table', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('id_table',$table, null,  array('class' => 'form-control')) !!}

{!! $errors->first('id_table', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('waktu_trigger', 'Time', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('waktu_trigger', array('BEFORE' => 'BEFORE', 'AFTER' => 'AFTER'),null,array('class' => 'form-control')) !!}
{!! $errors->first('waktu_trigger', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('event_trigger', 'Event', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::select('event_trigger', array('INSERT' => 'INSERT', 'UPDATE' => 'UPDATE', 'DELETE' => 'DELETE'),null,array('class' => 'form-control')) !!}
{!! $errors->first('event_trigger', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
{!! Form::label('isi_trigger', 'Isi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::textArea('isi_trigger', null, ['class'=>'form-control']) !!}
{!! $errors->first('isi_trigger', '<p class="help-block">:message</p>') !!}
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
