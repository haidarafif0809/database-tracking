{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}

@if($model->status_tugas == 0 )
<a href="{{ $belum_url }}" class="btn btn-success">Belum Di kerjakan</a>

@elseif($model->status_tugas == 1 )
<a href="{{ $proses_url }}" class="btn btn-success">Sedang Di Kerjakan</a>

@elseif($model->status_tugas == 2  )
<a href="{{ $selesai_url }}" class="btn btn-success">Sudah Selesai</a>


@endif

<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

