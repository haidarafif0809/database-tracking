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
use Telegram\Bot\Api;
use Telegram;
use App\Tugas;

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


      $tugas = Tugas::with(['user'])->where('status_tugas','!=','3')->orderBy('created_at','desc');


            return Datatables::of($tugas)->addColumn('action', function($tugas){
                 $id_user = Auth::user()->id;

            return view('tugas._action', 
            [ 
             'belum_url' => route('tugas.belum', $tugas->id),  

            'proses_url' => route('tugas.proses', $tugas->id),
            'selesai_url' => route('tugas.selesai', $tugas->id),
            'edit_url' => route('data.edit', $tugas->id),
            'hapus_url' => route('data.destroy',$tugas->id),   
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
                     $status_tugas = " Sedang Di Proses";
                }
                elseif ($tugas->status_tugas == 2) {
                    # code...
                     $status_tugas = "Sudah Selesai";
                }
                return $status_tugas;
            })->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'judul', 'name'=>'judul', 'title'=>'Judul'])
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'Petugas'])
->addColumn(['data' => 'status_tugas', 'name'=>'status_tugas', 'title'=>'Status' , 'searchable'=>false])
->addColumn(['data' => 'deadline', 'name'=>'deadline', 'title'=>'deadline'])
->addColumn(['data' => 'waktu_selesai', 'name'=>'waktu_selesai', 'title'=>'waktu_selesai'])
->addColumn(['data' => 'action', 'name'=>'action', 'title'=>'', 'orderable'=>false, 'searchable'=>false]); 
  

         return view('tugas.index')->with(compact('html')); 
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
         'foto_tugas' => 'image|max:2048'
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


        Session::flash("flash_notification",[
            "level"=>"success",
            "message"=>"Berhasil Menyimpan Tugas $tugas->judul"
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
 

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"tugas Berhasil Di Hapus"
            ]);
        return redirect()->route('data.index');
    }
}
