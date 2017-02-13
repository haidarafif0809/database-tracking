{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline js-confirm', 'data-confirm' => $confirm_message]) !!}


<a href="{{ $komentar_url }}" class="btn btn-sm btn-success">Komentar</a> |

@if($model->status_tugas == 0 AND $model->id_petugas == $id_user)
<a href="{{ $proses_url }}" class="btn btn-success">kerjakan</a>

@elseif($model->status_tugas == 1 AND $model->id_petugas == $id_user) 
<a href="{{ $selesai_url }}" class="btn btn-success">Sudah Selesai</a>

@elseif($model->status_tugas == 2 AND $model->id_petugas != $id_user)
<a href="{{ $konfirmasi_url }}" class="btn btn-success">Konfirmasi</a>
<a href="{{ $belum_url }}" class="btn btn-success">Belum Selesai</a>

@elseif($model->status_tugas != 3  )

@endif

<a href="{{ $edit_url }}">Edit</a>

{!! Form::submit('Hapus',['class'=>'btn btn-sm btn-danger']) !!}
{!! Form::close() !!}

