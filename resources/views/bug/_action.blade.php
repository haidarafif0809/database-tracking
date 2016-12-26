



{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}
<a href="{{ $deskripsi_url }}" class="btn btn-warning">Deskripsi</a>

@if($model->status_bug == 0 AND $model->pengadu != $id_user)
<a href="{{ $on_hold_url }}" class="btn btn-success">On-Hold</a>

@elseif($model->status_bug == 1 AND $model->debugger == $id_user )
<a href="{{ $finish_debug_url }}" class="btn btn-success">Finish Debug</a>

@elseif($model->status_bug == 2 AND $model->pengadu == $id_user )
<a href="{{ $still_has_url }}" class="btn btn-success">Still has bug</a>

<a href="{{ $finish_testing_url }}" class="btn btn-success">Finish Testing</a>

@endif

<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

