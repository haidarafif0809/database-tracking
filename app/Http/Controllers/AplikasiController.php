<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\DB;
use App\Database;
use Auth;
use Session;
use App\Aplikasi;
use Telegram\Bot\Api;
use Telegram;

class AplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $aplikasi = Aplikasi::select(['id','nama_aplikasi','url_aplikasi']);


            return Datatables::of($aplikasi)->addColumn('action', function($aplikasi){
                 $id_user = Auth::user()->id;
            return view('aplikasi._action', 
            [
            'edit_url' => route('aplikasi.edit', $aplikasi->id),
            'hapus_url' => route('aplikasi.destroy',$aplikasi->id),          
            'model' => $aplikasi,]);
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'nama_aplikasi', 'name'=>'nama_aplikasi', 'title'=>'Nama Aplikasi'])
->addColumn(['data' => 'url_aplikasi', 'name'=>'url_aplikasi', 'title'=>'url_aplikasi'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]);
return view('aplikasi.index')->with(compact('html'));
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('aplikasi.create');
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
        'nama_aplikasi' => 'required|unique:aplikasis,nama_aplikasi',
        'url_aplikasi' => 'required',

        ]);

          $aplikasi = Aplikasi::create(['nama_aplikasi' => $request->nama_aplikasi,'url_aplikasi' =>  $request->url_aplikasi]);

           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Membuat Aplikasi$request->nama_aplikasi"
    ]);

       
    return redirect('/bug/aplikasi');
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

         $aplikasi = Aplikasi::find($id);
        return view('aplikasi.edit',['aplikasi' => $aplikasi]);
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
        'nama_aplikasi' => 'required|unique:aplikasis,nama_aplikasi',
        'url_aplikasi' => 'required',

        ]);

            Aplikasi::where('id', $id)
          ->update(['nama_aplikasi' => $request->nama_aplikasi ,'url_aplikasi' => $request->url_aplikasi]);
 Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Mengubah Aplikasi $request->nama_aplikasi"
    ]);

       
    return redirect('/bug/aplikasi');



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

        $aplikasi = Aplikasi::find($id);


           Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Menghapus Aplikasi $aplikasi->nama_aplikasi"
    ]);

       Aplikasi::destroy($id);
    return redirect('/bug/aplikasi');
    }
}
