<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\KategoriAcara;
use Ramsey\Uuid\Uuid;
use DB;

class KategoriAcaraController extends Controller
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
        $cek =DB::table('kategori_acara')->max('id_kategori');
            if($cek == NULL){

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "KA-";
                $id_kategori = $tamp.sprintf("%03s", $noUrut);
            }
            else{

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "KA-";
                $id_kategori =$tamp.sprintf("%03s", $noUrut);

            }
        $datas = KategoriAcara::orderBy('updated_at', 'desc')->get();
        return view('master.kategori.index',compact('datas','id_kategori'));
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

            KategoriAcara::create([
              'id' => $uuid,
              'id_kategori' => $req['id_kategori'],
              'nama_kategori' => $req['nama_kategori'],
            ]);
            return redirect()
                ->route('kategori.index')
                ->with('success', 'Data berhasil disimpan.');

          }catch(Exception $e){
            return redirect()
                ->route('kategori.index')
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
            $kategori = KategoriAcara::findOrFail($id);


            $kategori->id_kategori = $req['id_kategori'];
            $kategori->nama_kategori = $req['nama_kategori'];
            $kategori->save();

            return redirect()
                ->route('kategori.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('kategori.index')
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
            KategoriAcara::findOrFail($id)->delete();
            return redirect()
                ->route('kategori.index')
                ->with('success', 'Data berhasil dihapus.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('kategori.index')
                ->with('error', 'Data tidak ditemukan.');
          }
    }
}
