<div class="form-group{{ $errors->has('nama_aplikasi') ? ' has-error' : '' }}">
{!! Form::label('nama_aplikasi', 'Nama Aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('nama_aplikasi', null, ['class'=>'form-control']) !!}
{!! $errors->first('nama_aplikasi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('lokasi_aplikasi') ? ' has-error' : '' }}">
{!! Form::label('lokasi_aplikasi', 'Lokasi / Directory Aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('lokasi_aplikasi', null, ['class'=>'form-control']) !!}
{!! $errors->first('lokasi_aplikasi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('folder_aplikasi') ? ' has-error' : '' }}">
{!! Form::label('folder_aplikasi', 'Folder Aplikasi', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('folder_aplikasi', null, ['class'=>'form-control']) !!}
{!! $errors->first('folder_aplikasi', '<p class="help-block">:message</p>') !!}
</div>
</div>

<div class="form-group{{ $errors->has('alamat_git') ? ' has-error' : '' }}">
{!! Form::label('alamat_git', 'Alamat Git', ['class'=>'col-md-2 control-label']) !!}
<div class="col-md-4">
{!! Form::text('alamat_git', null, ['class'=>'form-control']) !!}
{!! $errors->first('alamat_git', '<p class="help-block">:message</p>') !!}
</div>
</div>


<div class="form-group">
<div class="col-md-4 col-md-offset-2">
{!! Form::submit('Simpan', ['class'=>'btn btn-primary']) !!}
</div>
</div>
