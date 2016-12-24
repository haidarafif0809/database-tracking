



{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}
<a href="{{ $column_url }}" class="btn btn-default">Detail Column</a>
<a href="{{ $sample_data_url }}" class="btn btn-default">Sample Data</a>
<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

