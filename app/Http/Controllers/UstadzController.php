<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ustadz;
use Ramsey\Uuid\Uuid;
use DB;

class UstadzController extends Controller
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
        $cek =DB::table('tb_ustadz')->max('id_ustadz');
            if($cek == NULL){

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "US-";
                $id_ustadz = $tamp.sprintf("%03s", $noUrut);
            }
            else{

                $noUrut = (int) substr($cek, 4, 3);
                $noUrut++;
                $tamp = "US-";
                $id_ustadz =$tamp.sprintf("%03s", $noUrut);

            }
        $datas = Ustadz::orderBy('updated_at', 'desc')->get();
        return view('master.ustadz.index',compact('datas','id_ustadz'));
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
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('foto');

            $nama_file = time()."_".$file->getClientOriginalName();

            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'foto-ustadz';
            $file->move($tujuan_upload,$nama_file);

          Ustadz::create([
            'id' => $uuid,
            'id_ustadz' => $req['id_ustadz'],
            'nama' => $req['nama'],
            'tgl_lahir' => $req['tgl'],
            'jenis_k' => $req['jk'],
            'alamat' => $req['alamat'],
            'no_telpon' => $req['no_hp'],
            'foto' => $nama_file,
          ]);
          return redirect()
              ->route('ustadz.index')
              ->with('success', 'Ustadz berhasil disimpan.');

        }catch(Exception $e){
          return redirect()
              ->route('ustadz.create')
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
        die;
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
            $ustadz = Ustadz::findOrFail($id);
            if ($request->file('foto')!='') {
              $file = $request->file('foto');
              $nama_file = time()."_".$file->getClientOriginalName();
              $tujuan_upload = 'foto-ustadz';
              $file->move($tujuan_upload,$nama_file);
              $ustadz->foto = $nama_file;
            }

            $ustadz->id_ustadz = $req['id_ustadz'];
            $ustadz->nama = $req['nama'];
            $ustadz->tgl_lahir = $req['tgl'];
            $ustadz->no_telpon = $req['no_hp'];
            $ustadz->jenis_k = $req['jk'];
            $ustadz->alamat = $req['alamat'];
            $ustadz->save();

            return redirect()
                ->route('ustadz.index')
                ->with('success', 'Data berhasil diubah.');

          } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e){
            return redirect()
                ->route('ustadz.index')
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
        //
    }
}
