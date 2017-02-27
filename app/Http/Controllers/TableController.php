<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Table;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Yajra\Datatables\Datatables\Eloquent;
use Illuminate\Support\Facades\DB;
use App\Database;
use Auth;
use Session;
use File;
use Telegram;
use App\History;
use App\Column;
use App\IndukData;
use App\SampleData;

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
        'nama_table' => "required|unique:tables,nama_table,NULL,id,id_database,$request->id_database",
         'id_database' => 'required',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;
        $nama_user =  Auth::user()->name;
     $table = new  Table();
     $table->nama_table = $request->nama_table;
     $table->user_id = $id_user;
     $table->tanggal = $tanggal;
     $table->id_database = $request->id_database;
     $table->keterangan = $request->keterangan;
     $table->save();

     $database = Database::find($table->id_database);

     $history = new History();
     $history->id_user = $id_user;
     $history->kejadian = "Menambah table $table->nama_table di database $database->nama_database";
     $history->link = "/tracking/table/$table->id";
     $history->save();

      $response = Telegram::sendMessage([
      'chat_id' => '99811980', 
      'text' => "$nama_user Membuat Table $table->nama_table di Database $database->nama_database "
    ]);

           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menambah table $table->nama_table"
    ]);
       
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


      $table = Table::with('user')->where('id_database' , $id);

  


            return Datatables::of($table)->addColumn('action', function($table){
                 $id_user = Auth::user()->id;
            return view('table._action', 
            [
            'edit_url' => route('table.edit', $table->id),
            'column_url' => route('column.show', $table->id),
            'hapus_url' => route('table.destroy',$table->id),
            'sample_data_url' => route('table.sample',$table->id),
            'model' => $table,
            'id_user' =>  $id_user,
            ]);
            })->make(true);
    }

    $database = Database::find($id);
$html = $htmlBuilder
->addColumn(['data' => 'nama_table', 'name'=>'nama_table', 'title'=>'Nama Table',])
->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'keterangan', 'searchable'=>false])
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'User', 'searchable'=>false])
->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal' ,'searchable'=>false])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('table.index',['id_database' => $id,'nama_database' => $database->nama_database])->with(compact('html'));


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

         return view('table.edit',['id_database'=> $table->id_database,'table' => $table ]);
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
     $nama_lama = $table->nama_table;
     $table->nama_table = $request->nama_table;
     $table->user_id = $id_user;
     $table->tanggal = $tanggal;
     $table->id_database = $request->id_database;
     $table->keterangan = $request->keterangan;
     $table->save();



    $database = Database::find($table->id_database);
    $history = new History()    ;
     $history->id_user = $id_user;
     $history->kejadian = "Mengubah nama table $nama_lama menjadi $table->nama_table di database $database->nama_database";
     $history->link = "/tracking/table/$request->id_database";
     $history->save();

             Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil mengubah nama table $nama_lama menjadi  $table->nama_table"
    ]);
       
       
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
 $id_user = Auth::user()->id;
 $nama_user = Auth::user()->name;
  $table = Table::find($id);
  $database = Database::find($table->id_database);
    $history = new History();
     $history->id_user = $id_user;
     $history->kejadian = "Menghapus table $table->nama_table di database $database->nama_database";
     $history->link = "/tracking/table/$table->id";
     $history->save();

      $response = Telegram::sendMessage([
      'chat_id' => '99811980', 
      'text' => "$nama_user Menghapus Table $table->nama_table di Database $database->nama_database "
    ]);

                  Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus table $table->nama_table"
    ]);
       

        Table::destroy($id);
          return redirect()->back();
    }

    public function sample_data($id){

        $table = Table::find($id);

        $column = Column::where('id_table',$id)->get();
   
    

    }


    public function create_sample_data($id){

$table = Table::find($id);

        $column = Column::where('id_table',$id)->get();
   
    return view('table.sample',['column' => $column,'id_table' => $table->id,'id_database' => $table->id_database]);

    }
     public function store_sample_data(Request $request){


          $this->validate($request, [
        'id_table' => 'required',
         'id_database' => 'required',
        ]);
        $IndukData = IndukData::create(['id_table' => $request->id_table ,'id_database' => $request->id_database]);

            $id_induk = $IndukData->id;
              $column = Column::where('id_table',$request->id_table)->get();

              foreach ($column as $columns) {
                  # code...
                $nama_column  = $columns->nama_column;
                $sample_data = new SampleData();
                $sample_data->id_induk = $id_induk ;
                $sample_data->id_column = $columns->id;
                $sample_data->id_database = $request->id_database;
                $sample_data->id_table = $request->id_table ;
                $sample_data->data =  $request->$nama_column; 
                $sample_data->save();
              }
                          Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Membuat Sampe data "
    ]);
       

                return redirect("/tracking/table/$request->id_database");
     



     }
}
