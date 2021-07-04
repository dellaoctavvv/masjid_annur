<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Transaksi;
use Ramsey\Uuid\Uuid;
use DB;

class PengeluaranController extends Controller
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
        $datas = Transaksi::where('jenis', 'Pengeluaran')->orderBy('updated_at', 'desc')->get();
        return view('transaksi.pengeluaran.index',compact('datas'));
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
              'tanggal' => $req['tanggal'],
              'keterangan' => $req['keterangan'],
              'kredit' => $req['kredit'],
              'jenis' => "Pengeluaran",
            ]);
            return redirect()
                ->route('pengeluaran.index')
                ->with('success', 'Data berhasil disimpan.');

          }catch(Exception $e){
            return redirect()
                ->route('pengeluaran.index')
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
            $pengeluaran = Transaksi::findOrFail($id);


            $pengeluaran->tanggal = $req['tanggal'];
            $pengeluaran->keterangan = $req['keterangan'];
            $pengeluaran->kredit = $req['kredit'];
            $pengeluaran->save();

            return redirect()
                ->route('pengeluaran.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('pengeluaran.index')
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
                ->route('pengeluaran.index')
                ->with('success', 'Data berhasil dihapus.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('pengeluaran.index')
                ->with('error', 'Data tidak ditemukan.');
          }
    }
}
