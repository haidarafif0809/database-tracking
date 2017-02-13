<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Tugas;
use App\Komen;
use Auth;
use Telegram\Bot\Api;
use Telegram;

class KomenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id){

        //       
        $tugas = Tugas::with('user')->find($id);
        $komen = komen::with('user')->where('id_tugas',$id)->orderBy('created_at','desc')->get();

        return view('tugas.komen',['tugas' => $tugas,'komen' => $komen]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
              $this->validate($request, ['komentar' => "required",]);
  
  $id_user = Auth::user()->id;
  $name = Auth::user()->name;

  $komentar = Komen::create(['id_user'=> $id_user, 'id_tugas' => $request->id_tugas,'komentar' => $request->komentar ] );

  $tugas = Tugas::find($request->id_tugas);
        $judul = $tugas->judul;

$response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID_PEMBARUAN'), 
          'text' => "$name Menambahkan Komentar $komentar->komentar Di Tugas $tugas->judul "]);


  Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Membuat komentar di tugas $tugas->judul"
    ]); 

  return redirect()->back();
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
    }
}
