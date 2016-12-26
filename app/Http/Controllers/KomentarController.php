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
class KomentarController extends Controller
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
              $this->validate($request, [
        'komentar' => "required",
        ]);
  $id_user = Auth::user()->id;
$name = Auth::user()->name;
  $komentar = Komentar::create(['user_id'=> $id_user, 'bug_id' => $request->bug_id,'komentar' => $request->komentar ] );

  $bug = Bug::find($request->bug_id);

  Session::flash("flash_notification", [
    "level"=>"success",
    "message"=>"Berhasil Membuat Komentar di Bug $bug->judul"
    ]);
        $chat_id = '-188078178';
  $response= Telegram::sendMessage([
      'chat_id' =>   $chat_id, 
      'text' => "$name Berkomentar di bug $bug->judul \n $request->komentar   "
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
