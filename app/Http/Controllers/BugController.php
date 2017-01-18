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
use App\Bug;
use App\Aplikasi;
use App\Komentar;
class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $bug = Bug::with(['aplikasi','user'])->where('status_bug','!=','3')->orderBy('created_at','desc');


            return Datatables::of($bug)->addColumn('action', function($bug){
                 $id_user = Auth::user()->id;

            return view('bug._action', 
            [
            'finish_debug_url' => route('bug.finish_debug', $bug->id),
             'still_has_url' => route('bug.still_has', $bug->id),
            'deskripsi_url' => route('bug.deskripsi', $bug->id),
             'finish_testing_url' => route('bug.finish_testing', $bug->id),

            'on_hold_url' => route('bug.onhold', $bug->id),
            'edit_url' => route('list.edit', $bug->id),
            'hapus_url' => route('list.destroy',$bug->id),   
            'id_user' => $id_user,       
            'model' => $bug,]);
            })->addColumn('status_bug_aplikasi',function($bug){
                $status_bug = "";
                if ($bug->status_bug == 0 ) {
                    # code...
                    $status_bug = "Not On-Hold / Still has Bugs";

                }
                elseif ($bug->status_bug == 1) {
                    # code...
                     $status_bug = " On-Hold";
                }
                elseif ($bug->status_bug == 2) {
                    # code...
                     $status_bug = "Finish Debug";
                }
                 elseif ($bug->status_bug == 3) {
                    # code...
                     $status_bug = "Finish Testing";
                }
                return $status_bug;
            })->addColumn('debugger',function($bug){

                    $debugger = User::find($bug->debugger);

                    return $debugger->name;

            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul bug'])
->addColumn(['data' => 'aplikasi.nama_aplikasi', 'name'=>'aplikasi.nama_aplikasi', 'title'=>'Aplikasi'])
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Pelapor'])
->addColumn(['data' => 'debugger', 'name'=>'debugger', 'title'=>'Debugger'])
->addColumn(['data' => 'status_bug_aplikasi', 'name'=>'status_bug_aplikasi', 'title'=>'Status'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'created_at'])
->addColumn(['data' => 'updated_at', 'name'=>'updated_at', 'title'=>'updated_at'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]); 
return view('bug.index')->with(compact('html'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         $aplikasi = Aplikasi::all()->pluck('nama_aplikasi', 'id');
        return view('bug.create',['aplikasi' => $aplikasi]);
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
        'judul' => "required",
         'deskripsi' => 'required',
         'aplikasi_id' => 'required',
        ]);
  $id_user = Auth::user()->id;
  $name = Auth::user()->name;
         $bug = Bug::create(['judul' => $request->judul,'deskripsi' => $request->deskripsi,'aplikasi_id' => $request->aplikasi_id,'pengadu' => $id_user]);

$aplikasi = Aplikasi::find($request->aplikasi_id);
           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menambah Aduan Bug"
    ]);

           $chat_id = '-188078178';
           $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name Membuat aduan \n $request->judul \n $request->deskripsi \n di aplikasi $aplikasi->nama_aplikasi  "
    ]);
             return redirect("/bug/list");
       

    }

    public function on_hold($id){
        $id_user = Auth::user()->id;
        $bug = Bug::find($id);


        if ($bug->status_bug == 1) {

              Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Status Aduan Sedang di Kerjakan Oleh Orang Lain"
            ]);

        }
        else {
                 $bug->status_bug = 1;
            $bug->debugger =   $id_user;
            $bug->save();
              $name = Auth::user()->name;

            $chat_id = '-188078178';

               $response= Telegram::sendMessage([
          'chat_id' =>   $chat_id, 
          'text' => "$name mengubah status aduan \n $bug->judul menjadi On-Hold  "]);

             Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah status bug menjadi on-hold"
        ]);

        }
       

             return redirect("/bug/list");


    }
       public function finish_debug($id){

         $id_user = Auth::user()->id;
        $bug = Bug::find($id);
        $bug->status_bug = 2;
        $bug->save();

         Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Mengubah status bug menjadi Finish Debug"
    ]);

             $name = Auth::user()->name;

        $chat_id = '-188078178';

           $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name mengubah status aduan \n $bug->judul menjadi Finish Debug  "]);


             return redirect("/bug/list");

    }
       public function finish_testing($id){

 $id_user = Auth::user()->id;
        $bug = Bug::find($id);
        $bug->status_bug = 3;
        $bug->save();

         Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Mengubah status bug menjadi Finish Testing"
    ]);
            $name = Auth::user()->name;

        $chat_id = '-188078178';

           $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name mengubah status aduan \n $bug->judul menjadi Finish Testing  "]);

              return redirect("/bug/list");

    }
       public function still_has($id){

$id_user = Auth::user()->id;
        $bug = Bug::find($id);
        $bug->status_bug = 0;
        $bug->save();

         Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Mengubah status bug menjadi Still Has Bug"
    ]);

            $name = Auth::user()->name;

        $chat_id = '-188078178';

           $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name mengubah status aduan \n $bug->judul menjadi Still Has Bug  "]);

              return redirect("/bug/list");



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

        $bug = Bug::find($id);
         $aplikasi = Aplikasi::all()->pluck('nama_aplikasi', 'id');
        return view ('bug.edit',['bug' => $bug,'aplikasi' =>$aplikasi]);
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
        'judul' => "required",
         'deskripsi' => 'required',
         'aplikasi_id' => 'required',
        ]);
  $id_user = Auth::user()->id;
  $name = Auth::user()->name;
         $bug = Bug::where('id',$id)->update(['judul' => $request->judul,'deskripsi' => $request->deskripsi,'aplikasi_id' => $request->aplikasi_id,'pengadu' => $id_user]);

$aplikasi = Aplikasi::find($request->aplikasi_id);
           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Memperbarui Aduan Bug"
    ]);

           $chat_id = '-188078178';
           $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name Memperbarui aduan \n $request->judul \n $request->deskripsi \n di aplikasi $aplikasi->nama_aplikasi  "
    ]);
             return redirect("/bug/list");
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

            $bug = Bug::find($id);
            $judul = $bug->judul;
            Bug::destroy($id);
                $name = Auth::user()->name;

        $chat_id = '-188078178';

           $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name menghapus aduan bug $judul"]);

           return redirect()->back();



    }


    public function deskripsi($id){

        $bug = Bug::with('aplikasi')->find($id);
        $komentar = Komentar::with('user')->where('bug_id',$id)->orderBy('created_at','desc')->get();

        return view('bug.deskripsi',[
            'bug' => $bug,'komentar' => $komentar]);

    }
}
