<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use App\Column;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Database;
use Auth;
use Session;
use File;
use App\History;


class ColumnController extends Controller
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

        $status_increment = Column::where('id_table',$id)->where('status_increment',1)->count();
        $id_database = Table::find($id);
        return view('column.create',['id_table'=> $id,'id_database' =>$id_database ,'status_increment' => $status_increment ]);
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
        'nama_column' => "required|unique:columns,nama_column,NULL,id,id_table,$request->id_table",
         'id_table' => 'required',
         'length' => 'required|numeric'
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

         $column = new  Column();
         $column->nama_column = $request->nama_column;
         $column->id_user = $id_user;
         $column->tanggal = $tanggal;
         $column->tipe_data = $request->tipe_data;
         $column->status_increment = $request->status_increment;
         $column->status_null = $request->status_null;
         $column->status_unique =$request->status_unique;
          $column->length =$request->length;
           $column->default =$request->default;
         $column->id_table = $request->id_table;
         $column->keterangan = $request->keterangan;
         $column->save();


                  Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menambah column  $column->nama_column"
    ]);
       
       
    return redirect("/tracking/column/$request->id_table");
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

      $column = DB::table('columns')
                ->leftJoin('users', 'users.id', '=', 'columns.id_user')
               ->select('columns.*', 'users.name')->where('id_table',$id)
                ->orderBy('columns.tanggal', 'desc')->get();


            return Datatables::of($column)->addColumn('action', function($column){
                 $id_user = Auth::user()->id;
            return view('column._action', 
            [
            'edit_url' => route('column.edit', $column->id),
            'hapus_url' => route('column.destroy',$column->id),
            'model' => $column,
            'id_user' =>  $id_user,
            ]);
            })->make(true);
    }



    $table = Table::find($id);
    $database = Database::find($table->id_database);
$html = $htmlBuilder
->addColumn(['data' => 'nama_column', 'name'=>'nama_column', 'title'=>'Nama Column'])
->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'keterangan'])
->addColumn(['data' => 'tipe_data', 'name'=>'tipe_data', 'title'=>'tipe_data'])
->addColumn(['data' => 'status_increment', 'name'=>'status_increment', 'title'=>'status_increment'])
->addColumn(['data' => 'status_null', 'name'=>'status_null', 'title'=>'status_null'])
->addColumn(['data' => 'default', 'name'=>'default', 'title'=>'Default'])
->addColumn(['data' => 'status_unique', 'name'=>'status_unique', 'title'=>'status_unique'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);

return view('column.index',['id_table' => $id,'id_database' => $table->id_database ,'nama_table' => $table->nama_table,'nama_database' => $database->nama_database])->with(compact('html'));


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

        $column = Column::find($id);
        $table = Table::find($column->id_table);
        $id_database = $table->id_database;

     $status_increment = Column::where('id_table',$id)->where('status_increment',1)->count();
          return view('column.edit',['column'=> $column ,'id_table' => $column->id_table,'id_database' => $id_database,'status_increment' => $status_increment ]);
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
        'nama_column' => 'required',
         'id_table' => 'required',
         'length' => 'required|numeric'
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

         $column =  Column::find($id);
         $column->nama_column = $request->nama_column;
         $column->id_user = $id_user;
         $column->tanggal = $tanggal;
         $column->tipe_data = $request->tipe_data;
         $column->status_increment = $request->status_increment;
         $column->status_null = $request->status_null;
         $column->status_unique =$request->status_unique;
          $column->length =$request->length;
           $column->default =$request->default;
         $column->id_table = $request->id_table;
         $column->keterangan = $request->keterangan;
         $column->save();

      Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil mengubah column  $column->nama_column"
    ]);
       
       
    return redirect("/tracking/column/$request->id_table");
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
$column = Column::find($id);
     Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus column  $column->nama_column"
    ]);
       
        Column::destroy($id);
        return redirect()->back();

    }
}
