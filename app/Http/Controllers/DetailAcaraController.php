<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\DetailAcara;
use App\Acara;
use App\Ustadz;
use DB;


class DetailAcaraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        try {
            $req = $request->all();
            // $uuid = Uuid::uuid1();
                            
            DetailAcara::create([
              'id_acara' => $req['id_acara'],
              'id_ustadz' => $req['id_ustadz'],
              'waktu_mulai' => $req['waktu_mulai'],
              'waktu_selesai' => $req['waktu_selesai'],
              'materi' => $req['materi'],
            ]);
            return redirect()
                ->route('acara.show', $request->id_acara)
                ->with('success', 'Data berhasil disimpan.');
  
          }catch(Exception $e){
            return redirect()
                ->route('acara.show', $request->id_acara)
                ->with('error', 'Data gagal disimpan.');
          }
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
        try {
            $req = $request->all();
            $detail = DetailAcara::findOrFail($id);
            
            $detail->id_ustadz = $req['id_ustadz'];
            $detail->waktu_mulai = $req['waktu_mulai'];
            $detail->waktu_selesai = $req['waktu_selesai'];
            $detail->materi = $req['materi'];
            $detail->save();
  
            return redirect()
                ->route('acara.show', $request->id_acara)
                ->with('success', 'Data berhasil diubah.');
  
          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('acara.show', $request->id_acara)
                ->with('error', 'Data tidak ditemukan.');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $detail = DetailAcara::findOrFail($id);
            $id = $detail->id_acara;
            $detail->delete();
            return redirect()
                ->route('acara.show', $id)
                ->with('success', 'Data berhasil dihapus.');
  
          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('acara.show', $id)
                ->with('error', 'Data tidak ditemukan.');
          }
    }
}
