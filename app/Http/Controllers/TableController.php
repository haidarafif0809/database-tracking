<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Database;
use Auth;
use Session;
use File;

class TableController extends Controller
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

        return view('table.create',['id_database'=> $id ]);
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
        'nama_table' => 'required',
         'id_database' => 'required',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

     $table = new  Table();
     $table->nama_table = $request->nama_table;
     $table->id_user = $id_user;
     $table->tanggal = $tanggal;
     $table->id_database = $request->id_database;
     $table->keterangan = $request->keterangan;
     $table->save();
       
    return redirect("/tracking/table/$request->id_database");
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


      $table = DB::table('tables')
                ->leftJoin('users', 'users.id', '=', 'tables.id_user')
               ->select('tables.*', 'users.name')->where('id_database',$id)
                ->orderBy('tables.tanggal', 'desc')->get();


            return Datatables::of($table)->addColumn('action', function($table){
                 $id_user = Auth::user()->id;
            return view('table._action', 
            [
            'edit_url' => route('table.edit', $table->id),
            'column_url' => route('column.show', $table->id),
            'hapus_url' => route('table.destroy',$table->id),
            'model' => $table,
            'id_user' =>  $id_user,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'nama_table', 'name'=>'nama_database', 'title'=>'Nama Table'])
->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'keterangan'])
->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'User'])
->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('table.index',['id_database' => $id])->with(compact('html'));


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
        $table = Table::find($id);
         return view('table.edit',['id_database'=> $id,'table' => $table ]);
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

          $this->validate($request, [
        'nama_table' => 'required',
         'id_database' => 'required',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

     $table = Table::find($id);
     $table->nama_table = $request->nama_table;
     $table->id_user = $id_user;
     $table->tanggal = $tanggal;
     $table->id_database = $request->id_database;
     $table->keterangan = $request->keterangan;
     $table->save();
       
    return redirect("/tracking/table/$request->id_database");
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

        Table::destroy($id);
          return redirect()->back();
    }
}
