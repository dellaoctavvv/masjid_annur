<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Anggota;
use App\Gaji;
use Ramsey\Uuid\Uuid;
use DB;

class AnggotaController extends Controller
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
        $cek =DB::table('tb_dkm')->max('id_dkm');
            if($cek == NULL){

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "DK-";
                $id_dkm = $tamp.sprintf("%03s", $noUrut);
            }
            else{

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "DK-";
                $id_dkm =$tamp.sprintf("%03s", $noUrut);

            }
        $datas = Anggota::orderBy('updated_at', 'desc')->get();
        $gaji = Gaji::all();
        return view('master.anggota.index',compact('datas','id_dkm','gaji'));
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
        try{
            $req = $request->all();
            // $uuid = Uuid::uuid1();
         // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

             $nama_file = time()."_".$file->getClientOriginalName();

         // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto-anggota';
            $file->move($tujuan_upload,$nama_file);

         Anggota::create([
            'id_dkm' => $req['id_dkm'],
            'nama' => $req['nama'],
            'jenis_kelamin' => $req['jk'],
            'tgl_lahir' => $req['tgl_lahir'],
            'alamat' => $req['alamat'],
            'no_telpon' => $req['no_telpon'],
            'foto' => $nama_file,
            'id_gaji' => $req['posisi'],
        ]);
        return redirect()
              ->route('anggota.index')
              ->with('success', 'Anggota DKM berhasil disimpan.');

        }catch(Exception $e){
            return redirect()
                ->route('anggota.index')
                ->with('error', 'Anggota DKM gagal disimpan.');
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
        try{
            if(isset($request->bukti_pendaftaran)){
                $uuid = Uuid::uuid1();
                $file = $request->file('foto-anggota');

                $nama_file = time()."_".$file->getClientOriginalName();

                $tipe = $file->getMimeType()=="application/pdf"?"pdf":"img";
                $tujuan_upload = 'foto-anggota';
                if($tipe=="pdf"){
                    $tujuan_upload = 'public/foto-anggota/';
                }
                $file->move($tujuan_upload,$uuid.$nama_file);
            }
            $anggota = Anggota::findOrFail($id);
            $anggota->id_dkm = $request->id_anggota;
            $anggota->nama = $request->nama;
            $anggota->jenis_kelamin = $request->jk;
            $anggota->tgl_lahir = $request->tgl_lahir;
            $anggota->alamat = $request->alamat;
            $anggota->no_telpon = $request->no_telpon;
            $anggota->id_gaji = $request->jabatan;
            if(isset($request->foto)){
                $anggota->foto = $uuid.$nama_file;
            }
            $anggota->save();

            return redirect()
              ->route('anggota.index')
              ->with('success', 'Anggota DKM berhasil diedit.');

        }catch(Exception $e){
            return redirect()
                ->route('anggota.index')
                ->with('error', 'Anggota DKM gagal diedit.');
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
            Anggota::findOrFail($id)->delete();
            return redirect()
                ->route('anggota.index')
                ->with('success', 'Data berhasil dihapus.');

        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('anggota.index')
                ->with('error', 'Data tidak ditemukan.');
        }
    }
}
