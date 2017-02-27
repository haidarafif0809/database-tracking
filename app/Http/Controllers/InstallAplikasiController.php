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
use App\InstallAplikasi;
use App\Table;
use App\Column;
use App\History;
use Telegram\Bot\Api;
use Telegram;
use SSH;


class InstallAplikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(Request $request, Builder $htmlBuilder)
{
    if ($request->ajax()) {


      $database = InstallAplikasi::with('user');


            return Datatables::of($database)->make(true);
    }
$html = $htmlBuilder
->addColumn(['data' => 'nama_aplikasi', 'name'=>'nama_aplikasi', 'title'=>'Nama Aplikasi'])
->addColumn(['data' => 'lokasi_aplikasi', 'name'=>'lokasi_aplikasi', 'title'=>'lokasi_aplikasi'])
->addColumn(['data' => 'folder_aplikasi', 'name'=>'folder_aplikasi', 'title'=>'Folder'])
->addColumn(['data' => 'alamat_git', 'name'=>'alamat_git', 'title'=>'alamat_git'])
->addColumn(['data' => 'user.name', 'name'=>'user.name', 'title'=>'User'])
->addColumn(['data' => 'created_at', 'name'=>'created_at', 'title'=>'Created At']);

return view('install.index')->with(compact('html'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view ('install.create');
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
        'nama_aplikasi' => 'required|unique:install_aplikasis,nama_aplikasi',
        'lokasi_aplikasi' => 'required',
        'folder_aplikasi' => 'required|unique:install_aplikasis,folder_aplikasi',
        'alamat_git' => 'required|url'
        ]);
        $tanggal = date('Y-m-d');
        $id_user = Auth::user()->id;
        $nama_user = Auth::user()->name;

         SSH::run([
    "cd $request->lokasi_aplikasi",
    "mkdir $request->folder_aplikasi",
    "cd $request->folder_aplikasi",
    "git init",
    "git remote add origin $request->alamat_git ",
    "git pull origin master",
    ]);

        InstallAplikasi::create(['nama_aplikasi' => $request->nama_aplikasi,'lokasi_aplikasi' => $request->lokasi_aplikasi,'folder_aplikasi' => $request->folder_aplikasi,'alamat_git'=> $request->alamat_git,'user_id' => $id_user]);

         $response = Telegram::sendMessage([
      'chat_id' => '-188078178', 
      'text' => "$nama_user Menginstall aplikasi $request->nama_aplikasi "
    ]);


     Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil menginstall aplikasi $request->nama_aplikasi "
    ]);


return redirect('installer/install-aplikasi');


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
