<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Katsum;
Use App\Saran;
use Ramsey\Uuid\Uuid;
use DB;

class KatsumController extends Controller
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
        $cek =DB::table('tb_katsum')->max('id_katsum');
            if($cek == NULL){

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "KS-";
                $id_katsum = $tamp.sprintf("%03s", $noUrut);
            }
            else{

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "KS-";
                $id_katsum =$tamp.sprintf("%03s", $noUrut);

            }
        $datas = Katsum::orderBy('updated_at', 'desc')->get();
        return view('master.katsum.index',compact('datas','id_katsum'));
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
            $uuid = Uuid::uuid1();

            Katsum::create([
              'id' => $uuid,
              'id_katsum' => $req['id_katsum'],
              'nama_katsum' => $req['nama_katsum'],
            ]);
            return redirect()
                ->route('katsum.index')
                ->with('success', 'Data berhasil disimpan.');

          }catch(Exception $e){
            return redirect()
                ->route('katsum.index')
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
            $katsum = Katsum::findOrFail($id);


            $katsum->id_katsum = $req['id_katsum'];
            $katsum->nama_katsum = $req['nama_katsum'];
            $katsum->save();

            return redirect()
                ->route('katsum.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('katsum.index')
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
            Katsum::findOrFail($id)->delete();
            return redirect()
                ->route('katsum.index')
                ->with('success', 'Data berhasil dihapus.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('katsum.index')
                ->with('error', 'Data tidak ditemukan.');
          }
    }

    public function saran()
    {
        $datas = Saran::orderBy('updated_at', 'desc')->get();
        return view('master.saran.index',compact('datas'));
    }
}
