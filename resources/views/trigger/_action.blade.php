

<a href="{{ $isi_url }}" class="btn btn-xs btn-success">Isi Trigger</a>
<a href="{{ $edit_url }}">Edit</a>

{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}

{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

