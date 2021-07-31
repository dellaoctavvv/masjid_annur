<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Saran;
use App\Anggota;
use App\Ustadz;
use App\Acara;

use Ramsey\Uuid\Uuid;
use DB;

class HomeUserController extends Controller
{
    public function home()
    {
        $awal = date('Y-m-01');
        $akhir = date('Y-m-31');
        $tahun = date('Y');

        $pengeluaran = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                    ->where('jenis','Pengeluaran')
                    ->select(DB::raw('sum(kredit) as kredit'))
                    ->first();
        $pemasukan = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                    ->where('jenis','Pemasukan')
                    ->select(DB::raw('sum(debit) as debit'))
                    ->first();

        $datas = (object) array(
            "status" => ["active", "", "", "", ""],
            "link" => ["home", "about", "agent", "schedule", "contact"],
            "title" => ["Beranda", "Tentang", "Pengurus", "Jadwal", "Kontak"],

        );

        $acara = DB::table('tb_acara')
                    ->join('tb_detail_jadwal', 'tb_detail_jadwal.id_acara', 'tb_acara.id')
                    ->join('tb_ustadz', 'tb_ustadz.id','tb_detail_jadwal.id_ustadz')
                    ->select('tb_acara.nama_acara', 'tb_acara.tanggal', 'tb_detail_jadwal.*', 'tb_ustadz.nama')
                    ->whereBetween('tb_acara.tanggal', array($awal, $akhir))
                    ->get();
        return view('user.index', compact('pengeluaran','pemasukan', 'datas', 'acara'));
    }
    public function about()
    {
        $datas = (object) array(
            "status" => ["", "active", "", "", ""],
            "link" => ["home", "about", "agent", "schedule", "contact"],
            "title" => ["Beranda", "Tentang", "Pengurus", "Jadwal", "Kontak"],

        );
        return view('user.about', compact('datas'));
    }
    public function contact()
    {
        $datas = (object) array(
            "status" => ["", "", "", "", "active"],
            "link" => ["home", "about", "agent", "schedule", "contact"],
            "title" => ["Beranda", "Tentang", "Pengurus", "Jadwal", "Kontak"],

        );
        return view('user.contact', compact('datas'));
    }

    public function storeContact(Request $request)
    {
        try {
            $req = $request->all();
            // $uuid = Uuid::uuid1();

            Saran::create([
              'nama' => $req['nama'],
              'email' => $req['email'],
              'subjek' => $req['subjek'],
              'pesan' => $req['pesan'],
            ]);
            return redirect('user/contact')
                ->with('success', 'Kamu berhasil mengirim saran.');

          }catch(Exception $e){
            return redirect('user/contact')
                ->with('error', 'Maaf saran kamu gagal terkirim.');
          }
    }

    public function agent()
    {
        $datas = (object) array(
            "status" => ["", "", "active", "", ""],
            "link" => ["home", "about", "agent", "schedule", "contact"],
            "title" => ["Beranda", "Tentang", "Pengurus", "Jadwal", "Kontak"],

        );
        $anggota = Anggota::all();
        $ustadz = Ustadz::all();
        return view('user.agent', compact('datas', 'anggota', 'ustadz'));
    }
    public function schedule()
    {
        $awal = date('Y-m-d');
        $akhir = date('Y-m-31');
        $datas = (object) array(
            "status" => ["", "", "", "active", ""],
            "link" => ["home", "about", "agent", "schedule", "contact"],
            "title" => ["Beranda", "Tentang", "Pengurus", "Jadwal", "Kontak"],

        );
        $acara = DB::table('tb_acara')
                    ->join('tb_detail_jadwal', 'tb_detail_jadwal.id_acara', 'tb_acara.id')
                    ->join('tb_ustadz', 'tb_ustadz.id','tb_detail_jadwal.id_ustadz')
                    ->select('tb_acara.nama_acara', 'tb_acara.tanggal', 'tb_detail_jadwal.*', 'tb_ustadz.nama')
                    ->whereBetween('tb_acara.tanggal', array($awal, $akhir))
                    ->get();
        return view('user.schedule', compact('datas', 'acara'));
    }
}
