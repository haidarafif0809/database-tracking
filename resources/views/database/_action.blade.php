



{!! Form::model($model, ['url' => $hapus_url, 'method' => 'delete', 'class' => 'form-inline'] 
) !!}
<a href="{{ $table_url }}" class="btn btn-default">Table</a>
<a href="{{ $trigger_url }}" class="btn btn-success">Trigger</a>
<a href="{{ $export_url }}" class="btn btn-success">Export Database</a>
<a href="{{ $upload_sample_url }}" class="btn btn-success">Upload Sample</a>
<a href="{{ $download_sample_url }}" class="btn btn-success">Download Sample</a>

<a href="{{ $export_trigger_url }}" class="btn btn-success">Export Trigger</a>

<a href="{{ $edit_url }}">Edit</a>
{!! Form::submit('Hapus', ['class'=>'btn btn-xs btn-danger']) !!}
{!! Form::close()!!}

