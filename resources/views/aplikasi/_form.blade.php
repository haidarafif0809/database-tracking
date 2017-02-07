<div class="form-group{{ $errors->has('nama_aplikasi') ? ' has-error' : '' }}">
{!! Form::label('nama_aplikasi', 'Nama Aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_aplikasi', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_aplikasi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('url_aplikasi') ? ' has-error' : '' }}">
{!! Form::label('url_aplikasi', 'url_aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('url_aplikasi', null, ['class'=>'form-control']) !!}
{!! $errors->first('url_aplikasi', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
