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
use App\History;
use Telegram\Bot\Api;
use Telegram;
use SSH;
use App\Backup;

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
            'upload_sample_url' => route('database.upload',$database->id),
            'download_sample_url' => route('database.download',$database->sample_data),
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
        'nama_database' => 'required|unique:databases,nama_database',
        ]);

        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;
        $nama_user = Auth::user()->name;


     $database=  Database::create(['nama_database' => $request->nama_database ,'id_user' => $id_user ,'tanggal' => $tanggal
        ,'keterangan' => $request->keterangan]);

     $history = new History();
     $history->id_user = $id_user;
     $history->kejadian = "Menambah database dengan nama $database->nama_database";
     $history->link = "/tracking/database/$database->id";
     $history->save();

     $response = Telegram::sendMessage([
      'chat_id' => '-183930762', 
      'text' => "$nama_user Membuat database $request->nama_database "
    ]);


     Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menyimpan database $database->nama_database"
    ]);

       
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

    public function history(Request $request, Builder $htmlBuilder)
    {
        //

        if ($request->ajax()) {


      $history = DB::table('histories')
                ->leftJoin('users', 'users.id', '=', 'histories.id_user')
               ->select('histories.*', 'users.name')
                ->orderBy('histories.created_at', 'desc')->get();


            return Datatables::of($history)->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'name', 'name'=>'name', 'title'=>'User'])
->addColumn(['data' => 'kejadian', 'name'=>'kejadian', 'title'=>'Kejadian'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Waktu'])
->addColumn(['data' => 'link', 'name'=>'link', 'title'=>'Link', 'orderable'=>false, 'searchable'=>false]);
return view('history.index')->with(compact('html'));
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
     $nama_lama_database = $database->nama_database;
     $database->nama_database = $request->nama_database;
     $database->id_user = $id_user;
     $database->tanggal = $tanggal;
        $database->keterangan = $request->keterangan;
     $database->save();
       
      $history = new History();
     $history->id_user = $id_user;
     $history->kejadian = "Mengubah nama database $nama_lama_database menjadi $database->nama_database";
     $history->link = "/tracking/database/$database->id";
     $history->save();

     Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil mengubah database    $nama_lama_database menjadi $database->nama_database"
    ]);

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
    $database = Database::find($id);
    $id_user = Auth::user()->id;
    $nama_user =  Auth::user()->name;
     $history = new History();
     $history->id_user = $id_user;
     $history->kejadian = "Menghapus database $database->nama_database";
     $history->link = "/tracking/database/$database->id";
     $history->save();

      Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menghapus database $database->nama_database"
    ]);
      $response = Telegram::sendMessage([
      'chat_id' => '-183930762', 
      'text' => "$nama_user Menghapus database $database->nama_database "
    ]);

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
                if ($columns->length != 0) {
                    # code...
                    $query .= "(".$columns->length.")";
                }
                

                //status increment 

                if ($columns->status_increment == 1) {
                    # code...
                    $query .= " UNSIGNED AUTO_INCREMENT PRIMARY KEY";
                }

                //status null 
if($columns->status_null == 1 AND $columns->tipe_data == 'timestamp' )
                {
                     $query .= " NULL DEFAULT NULL";
                }
                 elseif ($columns->status_null == 1 AND $columns->status_increment == 0) {
                    # code...
                    $query .= " DEFAULT NULL";
                }

                elseif($columns->status_null == 0 AND $columns->status_increment == 0) {
                     $query .= " NOT NULL";
                     if ($columns->default != "") {
                         # code...
                        $query .= " DEFAULT '".$columns->default."'";
                     }
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

$content = str_split($query, 65536);
foreach ($content as $part) {
    echo $part;
}


       

    }

    public function telegram (){

//$response = Telegram::getUpdates();

$chat_id = '99811980';
   $response = Telegram::sendMessage([

 'parse_mode' => "asd",      'chat_id' =>$chat_id 
     
,      'text' => " Menghapus database <b>halo</b> *bold text* "
    ]);


return  $response;

// $response;


    }
    public function ssh() {

        SSH::run([
    'cd /home/andaglos',
    'mkdir folder_baru1',
    'cd folder_baru1',
    'git init',
    'git remote add origin https://github.com/haidarafif0809/database-tracking.git',
    'git pull origin master',
    ]);

    }


    public function backup_database(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $backup = Backup::with('user');


            return Datatables::of($backup)->addColumn('action', function($backup){
                 $id_user = Auth::user()->id;
            return view('database._action_backup', 
            [
            'isi_backup_url' => route('database.backup-isi', $backup->id),          
            ]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'User'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'created_at'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('database.index_backup')->with(compact('html'));
}

public function isi_backup($id){


    $backup = Backup::find($id);

    return view ('database.isi_backup',['isi_backup' => $backup->isi_backup]);

}

public function create_backup(){



     SSH::run([
    'cd /home/andaglos/public_html/backup_database',
    'php artisan backup:run',
    
    ] , function($line)
{
    $hasil =  $line.PHP_EOL;
    $id_user = Auth::user()->id;

        Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil melakukan backup"
    ]);

    Backup::create(['user_id' => $id_user,'isi_backup' => $hasil ]);

    return view ('database.create_backup',['hasil' => $hasil]);
});
  
}


public function upload_sample($id){



return view('database.upload',['id_database'=>$id]);

}


public function upload_sample_store(Request $request)
    {
        //

          $this->validate($request, [
        'sample_data' => 'required',
        'id_database' => 'required',
        ]);

        if ($request->hasFile('sample_data')) {
// Mengambil file yang diupload
        $uploaded_cover = $request->file('sample_data');
        // mengambil extension file
        $extension = $uploaded_cover->getClientOriginalExtension();

        if ($extension != 'sql') {
            # code...

        Session::flash("flash_notification", [
    "level"=>"danger",
    "message"=>"file yang di upload harus berexntensi sql"
    ]);

        return redirect()->back();

        }
        // membuat nama file random berikut extension
        $filename = md5(time()) . '.' . $extension;
        // menyimpan cover ke folder public/img
        $destinationPath = '/home/andaglos/public_html/database-tracking/sql';
        $uploaded_cover->move($destinationPath, $filename);
        // mengisi field cover di book dengan filename yang baru dibuat
        

        Database::find($request->id_database)->update(['sample_data' => $filename]);

            Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil mengupload sample data"
    ]);


        return redirect('/tracking/database');
    }

}


}
