{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}

@if($model->status_tugas == 0 AND $model->id_petugas != $id_user)
<a href="{{ $proses_url }}" class="btn btn-success">kerjakan</a>

@elseif($model->status_tugas == 1 AND $model->id_petugas != $id_user) 
<a href="{{ $selesai_url }}" class="btn btn-success">Sudah Selesai</a>

@elseif($model->status_tugas == 2  )


@endif

<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

