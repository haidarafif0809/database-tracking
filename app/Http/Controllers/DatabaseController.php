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

class DatabaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $database = DB::table('databases')
                ->leftJoin('users', 'users.id', '=', 'databases.id_user')
               ->select('databases.*', 'users.name')
                ->orderBy('databases.tanggal', 'desc')->get();


            return Datatables::of($database)->addColumn('action', function($database){
                 $id_user = Auth::user()->id;
            return view('database._action', 
            [
            'edit_url' => route('database.edit', $database->id),
            'table_url' => route('table.show', $database->id),
            'hapus_url' => route('database.destroy',$database->id),
            'export_url' => route('database.export',$database->id),
             'export_trigger_url' => route('database.export-trigger',$database->id),
            'trigger_url' => route('trigger.show',$database->id),
            'model' => $database,
            'id_user' =>  $id_user,
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'nama_database', 'name'=>'nama_database', 'title'=>'Nama Database'])
->addColumn(['data' => 'keterangan', 'name'=>'keterangan', 'title'=>'keterangan'])
->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'User'])
->addColumn(['data' => 'tanggal', 'name'=>'tanggal', 'title'=>'Tanggal'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('database.index')->with(compact('html'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('database.create');
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
        'nama_database' => 'required|unique:databases',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

     $database = new  Database();
     $database->nama_database = $request->nama_database;
     $database->id_user = $id_user;
     $database->tanggal = $tanggal;
        $database->keterangan = $request->keterangan;
     $database->save();
       
    return redirect('/tracking/database');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $database = Database::find($id);
        return view('database.edit',['database' => $database]);
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
        'nama_database' => 'required|unique:databases,nama_database',
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;

     $database =  Database::find($id);
     $database->nama_database = $request->nama_database;
     $database->id_user = $id_user;
     $database->tanggal = $tanggal;
        $database->keterangan = $request->keterangan;
     $database->save();
       
    return redirect('/tracking/database');
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

        Database::destroy($id);
        return redirect()->back();

    }

    public function export_database($id){

        //ambil table dengan id database yang dipilih
        $table = DB::table('tables')->where('id_database',$id)->get();
$query = "";

        foreach($table as $tables){

            $query .= "DROP TABLE IF EXISTS `".$tables->nama_table."`;";
            $query .= "CREATE TABLE ". $tables->nama_table." (";

            $column = DB::table('columns')->where('id_table',$tables->id)->get();
              $urutan_kolom = 0;
              foreach($column as $columns){
                //nama kolomnya 
                if ($urutan_kolom == 0) {
                    # code...
                      $query .= $columns->nama_column;
                }
                else {
                       $query .= ", ".$columns->nama_column;
                }
                     $urutan_kolom = $urutan_kolom + 1;

                //tipe data kolomnya

                $query .= " ".$columns->tipe_data;

                //length nya

                $query .= "(".$columns->length.")";

                //status increment 

                if ($columns->status_increment == 1) {
                    # code...
                    $query .= " UNSIGNED AUTO_INCREMENT PRIMARY KEY";
                }

                //status null 

                 if ($columns->status_null == 1 AND $columns->status_increment == 0) {
                    # code...
                    $query .= " DEFAULT NULL";
                }
                elseif($columns->status_null == 0 AND $columns->status_increment == 0) {
                     $query .= " NOT NULL";
                }

                if ($columns->status_unique == 1  AND $columns->status_increment != 1 ) {
                    # code...
                    $query .= " UNIQUE KEY";

                }



           

              }
$query .= ") ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        }


return $query;
        //while table nya 

        //buat string create table untuk table yang di while 

        //ambil column

        //while columnya 

        //buat string create column

    }



    public function export_trigger($id){

        //ambil table dengan id database yang dipilih
        $trigger = DB::table('triggers')->leftJoin('tables', 'tables.id', '=', 'triggers.id_table')
               ->select('triggers.*', 'tables.nama_table')->where('triggers.id_database',$id)->get();
$query = "";

        foreach($trigger as $triggers){
            //drop triggernya jika ada
            $query .= " DROP TRIGGER IF EXISTS `".$triggers->nama_trigger."`;
DELIMITER $$";
                //create trigger 
            $query .= " CREATE TRIGGER `".$triggers->nama_trigger."`  ".$triggers->waktu_trigger." ".$triggers->event_trigger." ON `".$triggers->nama_table."` FOR EACH ROW BEGIN  ".$triggers->isi_trigger." END$$ DELIMITER ;";


           
        }


return $query;
       

    }

}
