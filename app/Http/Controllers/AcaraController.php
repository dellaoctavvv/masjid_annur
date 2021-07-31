<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use App\KategoriAcara;
use App\DetailAcara;
use App\Acara;
use App\Ustadz;
use DB;

class AcaraController extends Controller
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
        $datas = Acara::orderBy('updated_at', 'desc')->get();
        $kategori = KategoriAcara::all();
        return view('master.acara.index',compact('datas', 'kategori'));
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

            Acara::create([
              'nama_acara' => $req['nama_acara'],
              'id_kategori' => $req['id_kategori'],
              'tanggal' => $req['tanggal'],
            ]);
            return redirect()
                ->route('acara.index')
                ->with('success', 'Data berhasil disimpan.');

          }catch(Exception $e){
            return redirect()
                ->route('acara.index')
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
        $acara = Acara::findOrFail($id);
        $datas = DetailAcara::where('id_acara', $id)->get();
        $ustadz = Ustadz::all();
        return view('master.acara.view',compact('datas', 'acara', 'ustadz'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
            $acara = Acara::findOrFail($id);

            $acara->id_kategori = $req['id_kategori'];
            $acara->tanggal = $req['tanggal'];
            $acara->nama_acara = $req['nama_acara'];
            $acara->save();

            return redirect()
                ->route('acara.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('acara.index')
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
            Acara::findOrFail($id)->delete();
            return redirect()
                ->route('acara.index')
                ->with('success', 'Data berhasil dihapus.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('acara.index')
                ->with('error', 'Data tidak ditemukan.');
          }
    }
}
