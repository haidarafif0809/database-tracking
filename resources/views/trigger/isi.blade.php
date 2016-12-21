@extends('layouts.app')
@section('content')
<div class="container">
<div class="row">
<div class="col-md-12">
<ul class="breadcrumb">
<li><a href="{{ url('/home') }}">Dashboard</a></li>
<li ><a href="{{ url('/tracking/database/') }}">Database</a></li>
<li ><a href="{{ url('/tracking/trigger/') }}/{{ $trigger->id_database }} ">Trigger</a></li>
<li class="active"> Isi Trigger</li>
</ul>
<div class="panel panel-default">
<div class="panel-heading">
<h2 class="panel-title"> Isi Trigger</h2>
</div>
<div class="panel-body">

{{ $trigger->isi_trigger }}

</div>
</div>
</div>
</div>
</div>
@endsection

