
<div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
{!! Form::label('detail', 'Komentar', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('detail', null, ['class'=>'form-control']) !!}
{!! $errors->first('detail', '<p class="help-block">:message</p>') !!}
</div>
</div>

{!! Form::hidden('id_pembaruan', $value = $pembaruan->id, ['class'=>'form-control']) !!}

<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
