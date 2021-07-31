<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gaji;
use Ramsey\Uuid\Uuid;
use DB;

class GajiController extends Controller
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
        $cek =DB::table('tb_gaji')->max('id_gaji');
            if($cek == NULL){

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "GJ-";
                $id_gaji = $tamp.sprintf("%03s", $noUrut);
            }
            else{

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "GJ-";
                $id_gaji =$tamp.sprintf("%03s", $noUrut);

            }
        $datas = Gaji::orderBy('updated_at', 'desc')->get();
        return view('master.gaji.index',compact('datas','id_gaji'));
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

            Gaji::create([
              'id_gaji' => $req['id_gaji'],
              'jabatan' => $req['jabatan'],
              'nominal' => $req['nominal'],
            ]);
            return redirect()
                ->route('gaji.index')
                ->with('success', 'Gaji berhasil disimpan.');

          }catch(Exception $e){
            return redirect()
                ->route('gaji.create')
                ->with('error', $e->toString());
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
            $gaji = Gaji::findOrFail($id);


            $gaji->id_gaji = $req['id_gaji'];
            $gaji->jabatan = $req['jabatan'];
            $gaji->nominal = $req['nominal'];
            $gaji->save();

            return redirect()
                ->route('gaji.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('gaji.index')
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
            Gaji::findOrFail($id)->delete();
            return redirect()
                ->route('gaji.index')
                ->with('success', 'Data berhasil dihapus.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('gaji.index')
                ->with('error', 'Data tidak ditemukan.');
          }
    }
}
