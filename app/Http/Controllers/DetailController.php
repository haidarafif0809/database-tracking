<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use App\Pembaruan;
use App\Detail;
use Auth;
use Telegram\Bot\Api;
use Telegram;

class DetailController extends Controller
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
              $this->validate($request, ['detail' => "required",]);
  
  $id_user = Auth::user()->id;
  $name = Auth::user()->name;

  $detail = Detail::create(['id_user'=> $id_user, 'id_pembaruan' => $request->id_pembaruan,'detail' => $request->detail ] );

  $pembaruan = Pembaruan::find($request->id_pembaruan);

$response= Telegram::sendMessage([
          'chat_id' =>   env('CHAT_ID'), 
          'text' => "$name Menambahkan Komentar $detail->detail Di Detail $pembaruan->judul "]);

  Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Membuat detail di pembaruan $pembaruan->judul"
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
