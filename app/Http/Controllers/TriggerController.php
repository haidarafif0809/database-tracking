<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Database;
use Auth;
use Session;
use File;
use App\Table;
use App\Column;
use App\Trigger;

class TriggerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //


        $table = Table::where('id_database', $id)->get();
         return view('trigger.create',['id_database'=> $id,'table' => $table ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $this->validate($request, [
        'nama_trigger' => "required|unique:triggers,nama_trigger,NULL,id,id_database,$request->id_database",
        'isi_trigger' => 'required',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

     $trigger = new  Trigger();
     $trigger->nama_trigger = $request->nama_trigger;
     $trigger->id_user = $id_user;
     $trigger->tanggal = $tanggal;
     $trigger->id_table = $request->id_table;
    $trigger->id_database = $request->id_database;
     $trigger->isi_trigger = $request->isi_trigger;
     $trigger->event_trigger = $request->event_trigger;
     $trigger->waktu_trigger = $request->waktu_trigger;
     $trigger->keterangan = $request->keterangan;
     $trigger->save();
       
    return redirect("/tracking/trigger/$request->id_database");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Builder $htmlBuilder, $id)
    {
        //

         if ($request->ajax()) {


      $trigger = DB::table('triggers')
                ->leftJoin('users', 'users.id', '=', 'triggers.id_user')
                ->leftJoin('tables','tables.id','=','triggers.id_table')
               ->select('triggers.*', 'users.name','tables.nama_table')->where('triggers.id_database',$id)
                ->orderBy('triggers.tanggal', 'desc')->get();


            return Datatables::of($trigger)->addColumn('action', function($trigger){
                 $id_user = Auth::user()->id;
            return view('trigger._action', 
            [
            'edit_url' => route('trigger.edit', $trigger->id),
            'isi_url' => route('trigger.isi', $trigger->id),
            'hapus_url' => route('trigger.destroy',$trigger->id),
            'model' => $trigger,
            'id_user' =>  $id_user,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'nama_trigger', 'name'=>'nama_trigger', 'title'=>'Nama Trigger'])
->addColumn(['data' => 'waktu_trigger', 'name'=>'waktu_trigger', 'title'=>'Waktu Trigger'])
->addColumn(['data' => 'event_trigger', 'name'=>'event_trigger', 'title'=>'Event Trigger'])
->addColumn(['data' => 'nama_table', 'name'=>'nama_table', 'title'=>'Table'])
->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'Tanggal'])
->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal'])
->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'User'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('trigger.index',['id_database' => $id])->with(compact('html'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $trigger = Trigger::find($id);
 $table = Table::where('id_database', $id)->get();

        return view('trigger.edit',['trigger' => $trigger,'table' => $table,'id_database' => $id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //
         $this->validate($request, [
        'nama_trigger' => 'required',
        'isi_trigger' => 'required',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

     $trigger = Trigger::find($id);
     $trigger->nama_trigger = $request->nama_trigger;
     $trigger->id_user = $id_user;
     $trigger->tanggal = $tanggal;
     $trigger->id_table = $request->id_table;
    $trigger->id_database = $request->id_database;
     $trigger->isi_trigger = $request->isi_trigger;
     $trigger->event_trigger = $request->event_trigger;
     $trigger->waktu_trigger = $request->waktu_trigger;
     $trigger->keterangan = $request->keterangan;
     $trigger->save();
       
    return redirect("/tracking/trigger/$request->id_database");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        Trigger::destroy($id);

         return redirect()->back();
    }

     public function isi($id)
    {
        //

        $trigger = Trigger::find($id);

        return view('trigger.isi',['trigger' => $trigger]);

    }
}
