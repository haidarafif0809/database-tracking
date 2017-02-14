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
use App\Tugas;
use DateTime;
use App\Komen;
use App\User;
use Telegram\Bot\Api;
use Telegram;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $tugas = Tugas::with(['user'])->where('tugas.status_tugas','!=','4')->orderBy('tugas.created_at','desc');


            return Datatables::of($tugas)->addColumn('action', function($tugas){
                 $id_user = Auth::user()->id;

            return view('tugas._action', 
            [    

            'komentar_url' => route('tugas.komentar',$tugas->id), 
            'proses_url' => route('tugas.proses', $tugas->id),
            'selesai_url' => route('tugas.selesai', $tugas->id),
            'belum_url' => route('tugas.belum', $tugas->id),
            'konfirmasi_url' => route('tugas.konfirmasi', $tugas->id),
            'edit_url' => route('data.edit', $tugas->id),
            'form_url' => route('data.destroy',$tugas->id),   
            'confirm_message' => 'Yakin Mau Mengapus Tugas ' . $tugas->judul . '?',
            'id_user' => $id_user,       
            'model' => $tugas,]);
            })->addColumn('status_tugas',function($tugas){
                $status_tugas = "status_tugas";
                if ($tugas->status_tugas == 0 ) {
                    # code...
                    $status_tugas = "Belum Di Kerjakan";

                }
                elseif ($tugas->status_tugas == 1) {
                    # code...
                     $status_tugas = " Sedang Di Kerjakan";
                }
                elseif ($tugas->status_tugas == 2) {
                    # code...
                     $status_tugas = "Belum Di Konfirmasi";
                }
                elseif ($tugas->status_tugas == 3) {
                    # code...
                     $status_tugas = "Sudah Di Konfirmasi/Sudah Selesai";
                } 
                return $status_tugas;
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul'])
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Petugas'])
->addColumn(['data' => 'status_tugas', 'name'=>'status_tugas', 'title'=>'Status' , 'searchable'=>false])
->addColumn(['data' => 'deadline', 'name'=>'deadline', 'title'=>'deadline'])
->addColumn(['data' => 'waktu_selesai', 'name'=>'waktu_selesai', 'title'=>'Waktu Selesai'])
->addColumn(['data' => 'waktu_konfirmasi', 'name'=>'waktu_konfirmasi', 'title'=>'Waktu Konfirmasi'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]); 
  

         return view('tugas.index')->with(compact('html')); 
}

  public function status_tugas(Request $request, Builder $htmlBuilder,$id)
{
    if ($request->ajax()) { 

     $tugas = Tugas::with(['user'])->where('status_tugas','=',$id)->orderBy('created_at','desc');

            return Datatables::of($tugas)->addColumn('action', function($tugas){
                 $id_user = Auth::user()->id;

            return view('tugas._action', 
            [    

            'komentar_url' => route('tugas.komentar',$tugas->id), 
            'proses_url' => route('tugas.proses', $tugas->id),
            'selesai_url' => route('tugas.selesai', $tugas->id),
            'belum_url' => route('tugas.belum', $tugas->id),
            'konfirmasi_url' => route('tugas.konfirmasi', $tugas->id),
            'edit_url' => route('data.edit', $tugas->id),
            'form_url' => route('data.destroy',$tugas->id), 
            'confirm_message' => 'Yakin Mau Mengapus Tugas ' . $tugas->judul . '?',  
            'id_user' => $id_user,       
            'model' => $tugas,]);
            })->addColumn('status_tugas',function($tugas){
                $status_tugas = "status_tugas";
                if ($tugas->status_tugas == 0 ) {
                    # code...
                    $status_tugas = "Belum Di Kerjakan";

                }
                elseif ($tugas->status_tugas == 1) {
                    # code...
                     $status_tugas = " Sedang Di Kerjakan";
                }
                elseif ($tugas->status_tugas == 2) {
                    # code...
                     $status_tugas = "Belum Di Konfirmasi";
                }
                elseif ($tugas->status_tugas == 3) {
                    # code...
                     $status_tugas = "Sudah Di Konfirmasi/Sudah Selesai";
                } 
                return $status_tugas;
            })->make(true);
    }

        $tugas = Tugas::find($id);

$html = $htmlBuilder
->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul'])
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Petugas'])
->addColumn(['data' => 'status_tugas', 'name'=>'status_tugas', 'title'=>'Status' , 'searchable'=>false])
->addColumn(['data' => 'deadline', 'name'=>'deadline', 'title'=>'deadline'])
->addColumn(['data' => 'waktu_selesai', 'name'=>'waktu_selesai', 'title'=>'Waktu Selesai'])
->addColumn(['data' => 'waktu_konfirmasi', 'name'=>'waktu_konfirmasi', 'title'=>'Waktu Konfirmasi'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]); 
return view('tugas.status',['id'=>$id])->with(compact('html')); 

}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tugas.create');
    }

    public function komentar($id){

        //       
        $tugas = Tugas::with('user')->find($id);
        $komen = komen::with('user')->where('id_tugas',$id)->orderBy('created_at','desc')->get();

        return view('tugas.komen',['tugas' => $tugas,'komen' => $komen]);
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
         'id_petugas' => 'required|exists:users,id',
         'judul' => 'required',
         'deadline' => 'required',
         'deskripsi' => 'required',
         'foto_tugas' => 'required|image|max:2048'
        ]);
          $name = Auth::user()->name; 

         $tugas = Tugas::create([
            'id_petugas' => $request->id_petugas,
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'deskripsi' => $request->deskripsi,
            $request->except('foto_tugas') ]);

if ($request->hasFile('foto_tugas')) {

            $uploaded_foto_tugas = $request->file('foto_tugas');

            $extension = $uploaded_foto_tugas->getClientOriginalExtension();

            $filename = md5(time()) . '.' . $extension;

            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'foto_tugas';
            $uploaded_foto_tugas->move($destinationPath, $filename);

            $tugas->foto_tugas = $filename;
            $tugas->save();
         }

$user = User::find($request->id_petugas);
               $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Menambahkan Tugas $tugas->judul, Nama Petugas $user->name, Deadline : $tugas->deadline, Deskripsi : $tugas->deskripsi"]);

            $response = Telegram::sendPhoto([
              'chat_id' => env('CHAT_ID_PEMBARUAN'), 
              'photo' => "foto_tugas/$tugas->foto_tugas"]);
                $messageId = $response->getMessageId();

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan tugas $tugas->judul"
            ]);
        return redirect()->route('data.index');
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
        $tugas = Tugas::find($id);
        return view('tugas.edit')->with(compact('tugas'));
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
         'id_petugas' => 'required|exists:users,id',
         'judul' => 'required',
         'deadline' => 'required',
         'deskripsi' => 'required',
         'foto_tugas' => 'image|max:2048'
        ]);
          $name = Auth::user()->name; 


          $tugas = Tugas::find($id);
          $tugas->update([
            'id_petugas' => $request->id_petugas,
            'judul' => $request->judul,
            'deadline' => $request->deadline,
            'deskripsi' => $request->deskripsi,
            $request->except('foto_tugas') ]);

          if ($request->hasFile('foto_tugas')) {
            $filename = null;
            $uploaded_foto_tugas = $request->file('foto_tugas');
            $extension = $uploaded_foto_tugas->getClientOriginalExtension();

            $filename = md5(time()) . '.' . $extension;

            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'foto_tugas';
            $uploaded_foto_tugas->move($destinationPath, $filename);

            if ($tugas->foto_tugas){
                $old_foto_tugas = $tugas->foto_tugas;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'foto_tugas' . DIRECTORY_SEPARATOR . $tugas->foto_tugas;

                try {
                    File::delete($filepath);
                }   catch (FileNotFoundException $e) {
                    //File sudah di hapus/tidak ada
                }
            }


            $tugas->foto_tugas = $filename;
            $tugas->save();

          }


$user = User::find($request->id_petugas);
               $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Mengubah Tugas $tugas->judul, Nama Petugas $user->name, Deadline : $tugas->deadline, Deskripsi : $tugas->deskripsi"]);

            $response = Telegram::sendPhoto([
              'chat_id' => env('CHAT_ID_PEMBARUAN'), 
              'photo' => "foto_tugas/$tugas->foto_tugas"]);
                $messageId = $response->getMessageId();

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Tugas $tugas->judul"
            ]);
        return redirect()->route('data.index');
    }


    public function proses($id){
        $id_user = Auth::user()->id;

        $tugas = Tugas::find($id);
        $judul = $tugas->judul;

 
                 $tugas->status_tugas = 1;
            $tugas->save();
              $name = Auth::user()->name;


        $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Sedang Mengerjakan Tugas $judul"]);


             Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah status tugas menjadi on-hold"
        ]);
 
        return redirect()->route('data.index');
    }


    public function selesai($id){
        $id_user = Auth::user()->id;

        $tugas = Tugas::find($id);
        $judul = $tugas->judul;
            $now = new DateTime();
                 $tugas->status_tugas = 2;
                 $tugas->waktu_selesai = $now;
            $tugas->save();
              $name = Auth::user()->name;


        $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Sudah Selesai Mengerjakan Tugas $judul"]);

             Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah status tugas menjadi on-hold"
        ]);
 
        return redirect()->route('data.index');
    }

        public function belum($id){
        $id_user = Auth::user()->id;

        $tugas = Tugas::find($id);
        $judul = $tugas->judul;
        $id_petugas = $tugas->id_petugas;

 
                 $tugas->status_tugas = 0;
            $tugas->save();
              $name = Auth::user()->name;

$user = User::find($tugas->id_petugas);
        $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Menguba Status Belum Di kerjakan Di Karenakan Tugas Belum Selesai,Judul Tugas : $judul, Nama Petugas : $user->name "]);


             Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah status tugas menjadi on-hold"
        ]);
 
        return redirect()->route('data.index');
    }

         public function konfirmasi($id){
        $id_user = Auth::user()->id;

        $tugas = Tugas::find($id);
        $judul = $tugas->judul;

 
            $konfirmasi = new DateTime();
                 $tugas->status_tugas = 3;
                 $tugas->waktu_konfirmasi = $konfirmasi;
            $tugas->save();
              $name = Auth::user()->name;

$user = User::find($tugas->id_petugas);
        $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Mengubah Status Sudah Di Konfirmasi Tugas $judul, Nama Petugas : $user->name "]);


             Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil Mengubah status tugas menjadi on-hold"
        ]);
 
        return redirect()->route('data.index');
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
        $tugas = Tugas::find($id);
            $judul = $tugas->judul;
            $id_petugas = $tugas->id_petugas;

        if ($tugas->foto_tugas) {
            $old_foto_tugas = $tugas->foto_tugas;
            $filepath = public_path() .DIRECTORY_SEPARATOR . 'foto_tugas' .DIRECTORY_SEPARATOR . $tugas->foto_tugas;

                try {
                    File::delete($filepath);
                }   catch (FileNotFoundException $e) {
                    //File sudah di hapus/tidak ada
                }
        }

        $tugas->delete();
 
$user = User::find($tugas->id_petugas);
 $name = Auth::user()->name;
          $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Menghapus Tugas $user->name Judul Tugas $judul"]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"tugas Berhasil Di Hapus"
            ]);
        return redirect()->route('data.index');
    }
}
