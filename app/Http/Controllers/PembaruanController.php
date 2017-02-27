<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Pembaruan;
use Auth;
use App\Detail;
use Telegram\Bot\Api;
use Telegram;
use App\Aplikasi;

class PembaruanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request, Builder $htmlBuilder)
    {
        //
        if ($request->ajax()) {
            $pembaruan = Pembaruan::with(['aplikasi','user']);

            return Datatables::of($pembaruan)
                ->addColumn('action', function($pembaruans){
                    return view('pembaruan._action', [
                        'model'    => $pembaruans,
                        'form_url' => route('pembaruan.destroy', $pembaruans->id),
                        'edit_url' => route('pembaruan.edit', $pembaruans->id),
                        'komentar_url' => route('pembaruan.komentar', $pembaruans->id),
                        'confirm_message' => 'Yakin Mau Mengapus Pembaruan ' . $pembaruans->judul . '?'
                        ]);
                })->make(true);
        }

        $html = $htmlBuilder
         ->addColumn(['data' => 'judul', 'name' => 'judul', 'title' => 'Judul'])
        ->addColumn(['data' => 'aplikasi.nama_aplikasi', 'name'=>'aplikasi.nama_aplikasi', 'title'=>'Aplikasi'])
        ->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'User'])
         ->addColumn(['data' => 'action', 'name'=>'action','title'=>'', 'orderable'=>false, 'searchable'=>false]);

         return view('pembaruan.index')->with(compact('html'));  
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pembaruan.create');
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
         'id_aplikasi' => 'required|exists:aplikasis,id',
         'judul' => 'required',
         'pemasalahan' => 'required',
         'pemecahan' => 'required',
         'foto' => 'image|max:2048'
        ]);


  $id_user = Auth::user()->id;
  $name = Auth::user()->name;
$aplikasi = Aplikasi::find($request->id_aplikasi);
         $pembaruans = Pembaruan::create(['id_user'=>$id_user,
            'id_aplikasi' => $request->id_aplikasi,
            'judul' => $request->judul,
            'pemasalahan' => $request->pemasalahan,
            'pemecahan' => $request->pemecahan,$request->except('foto') ]);

         $chat_id = env('CHAT_ID');

               $response= Telegram::sendMessage([
          'chat_id' =>    $chat_id, 
          'text' => "$name Menambahkan Pembaruan $pembaruans->judul, Nama Aplikasi $aplikasi->nama_aplikasi, Pemasalahan : $pembaruans->pemecahan, Pemecahan : $pembaruans->pemasalahan"]);

if ($request->hasFile('foto')) {

            $uploaded_foto = $request->file('foto');

            $extension = $uploaded_foto->getClientOriginalExtension();

            $filename = md5(time()) . '.' . $extension;

            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'foto';
            $uploaded_foto->move($destinationPath, $filename);

            $pembaruans->foto = $filename;
            $pembaruans->save();

        $lokasi_foto = $destinationPath."/".$filename;

                 $sendPhoto = Telegram::sendPhoto([
                  'chat_id' => $chat_id , 
                  'photo' => $lokasi_foto, 
                    'caption' =>  $request->judul
                ]);
         }


        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Pembaruan $pembaruans->judul"
            ]);
        return redirect()->route('pembaruan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function komentar($id){

        //       
        $pembaruan = Pembaruan::with('aplikasi')->find($id);
        $detail = Detail::with('user')->where('id_pembaruan',$id)->orderBy('created_at','desc')->get();

        return view('pembaruan.detail',['pembaruan' => $pembaruan,'detail' => $detail]);
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
        $pembaruans = Pembaruan::find($id);
        return view('pembaruan.edit')->with(compact('pembaruans'));
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
         'id_aplikasi' => 'required|exists:aplikasis,id',
         'judul' => 'required',
         'pemasalahan' => 'required',
         'pemecahan' => 'required',
         'foto' => 'image|max:2048'
        ]);

          $id_user = Auth::user()->id;
          $name = Auth::user()->name;
$aplikasi = Aplikasi::find($request->id_aplikasi);

          $pembaruan = Pembaruan::find($id);
          $pembaruan->update(['id_user'=>$id_user,'id_aplikasi' => $request->id_aplikasi,'judul' => $request->judul,'pemasalahan' => $request->pemasalahan,'pemecahan' => $request->pemecahan,$request->except('foto') ]);

         $chat_id = env('CHAT_ID');

              $response= Telegram::sendMessage([
          'chat_id' =>    $chat_id, 
          'text' => "$name Mengubah Pembaruan $pembaruan->judul, Nama Aplikasi $aplikasi->nama_aplikasi, Pemasalahan : $pembaruan->pemecahan, Pemecahan : $pembaruan->pemasalahan"]);

          if ($request->hasFile('foto')) {
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();

            $filename = md5(time()) . '.' . $extension;

            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'foto';
            $uploaded_foto->move($destinationPath, $filename);

            if ($pembaruan->foto){
                $old_foto = $pembaruan->foto;
                $filepath = public_path() . DIRECTORY_SEPARATOR . 'foto' . DIRECTORY_SEPARATOR . $pembaruan->foto;

                try {
                    File::delete($filepath);
                }   catch (FileNotFoundException $e) {
                    //File sudah di hapus/tidak ada
                }
            }


            $pembaruan->foto = $filename;
            $pembaruan->save();

        $lokasi_foto = $destinationPath."/".$filename;

                 $sendPhoto = Telegram::sendPhoto([
                  'chat_id' => $chat_id , 
                  'photo' => $lokasi_foto, 
                    'caption' =>  $request->judul
                ]);
          }
 

        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Pembaruan $pembaruan->judul"
            ]);
        return redirect()->route('pembaruan.index');
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
        $pembaruan = Pembaruan::find($id);
            $judul = $pembaruan->judul;

        if ($pembaruan->foto) {
            $old_foto = $pembaruan->foto;
            $filepath = public_path() .DIRECTORY_SEPARATOR . 'foto' .DIRECTORY_SEPARATOR . $pembaruan->foto;

                try {
                    File::delete($filepath);
                }   catch (FileNotFoundException $e) {
                    //File sudah di hapus/tidak ada
                }
        }

        $pembaruan->delete();

 $name = Auth::user()->name;
          $response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID'), 
          'text' => "$name Menghapus Pembaruan $judul"]);

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Pembaruan Berhasil Di Hapus"
            ]);
        return redirect()->route('pembaruan.index');
    }
}
