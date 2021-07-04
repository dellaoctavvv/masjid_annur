<?php

namespace App\Http\Controllers;
Use App\Transaksi;
Use App\Katsum;
use Ramsey\Uuid\Uuid;
use DB;

use Illuminate\Http\Request;

class PemasukanController extends Controller
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
        $datas = Transaksi::where('jenis', 'Pemasukan')
                        ->orderBy('updated_at', 'desc')->get();
        $kategori = Katsum::all();
        return view('transaksi.pemasukan.index',compact('datas', 'kategori'));
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

            Transaksi::create([
              'id' => $uuid,
              'id_katsum' => $req['id_katsum'],
              'penyumbang' => $req['penyumbang'],
              'tanggal' => $req['tanggal'],
              'keterangan' => $req['keterangan'],
              'debit' => $req['debit'],
              'jenis' => "Pemasukan",
            ]);
            return redirect()
                ->route('pemasukan.index')
                ->with('success', 'Data berhasil disimpan.');

          }catch(Exception $e){
            return redirect()
                ->route('pemasukan.index')
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
            $pemasukan = Transaksi::findOrFail($id);


            $pemasukan->id_katsum = $req['id_katsum'];
            $pemasukan->penyumbang = $req['penyumbang'];
            $pemasukan->tanggal = $req['tanggal'];
            $pemasukan->keterangan = $req['keterangan'];
            $pemasukan->debit = $req['debit'];
            $pemasukan->save();

            return redirect()
                ->route('pemasukan.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('pemasukan.index')
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
            Transaksi::findOrFail($id)->delete();
            return redirect()
                ->route('pemasukan.index')
                ->with('success', 'Data berhasil dihapus.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('pemasukan.index')
                ->with('error', 'Data tidak ditemukan.');
          }
    }
}
