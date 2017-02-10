
<div class="form-group{{ $errors->has('komentar') ? ' has-error' : '' }}">
{!! Form::label('komentar', 'Komentar', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('komentar', null, ['class'=>'form-control']) !!}
{!! $errors->first('komentar', '<p class="help-block">:message</p>') !!}
</div>
</div>

{!! Form::hidden('id_tugas', $value = $tugas->id, ['class'=>'form-control']) !!}

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
