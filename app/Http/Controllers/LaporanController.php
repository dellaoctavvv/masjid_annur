<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;

class LaporanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //Pengeluaran
    public function indexPengeluaran()
    {
        $awal = date('Y-m-01');
        $akhir = date('Y-m-d');

        $datas = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                ->where('jenis', 'Pengeluaran')
                ->orderBy('updated_at', 'desc')
                ->get();
        return view('laporan.pengeluaran', compact('datas','awal', 'akhir'));
    }

    public function storePengeluaran(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;

        $datas = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                    ->where('jenis', 'Pengeluaran')
                    ->get();
        return view('laporan.pengeluaran', compact('datas', 'awal', 'akhir'));
    }
    //Pemasukan
    public function indexPemasukan()
    {
        $awal = date('Y-08-20');
        $akhir = date('Y-m-d');

        $datas = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                ->where('jenis', 'Pemasukan')
                ->orderBy('updated_at', 'desc')
                ->get();
        return view('laporan.pemasukan', compact('datas','awal', 'akhir'));
    }

    public function storePemasukan(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;

        $datas = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                    ->where('jenis', 'Pemasukan')
                    ->get();
        return view('laporan.pemasukan', compact('datas', 'awal', 'akhir'));
    }
    //Keuangan
    public function indexKeuangan()
    {
        $awal = date('Y-m-01');
        $akhir = date('Y-m-d');

        $datas = Transaksi::whereBetween('tanggal', array($awal, $akhir))->orderBy('updated_at', 'desc')->get();
        return view('laporan.keuangan', compact('datas','awal', 'akhir'));
    }

    public function storeKeuangan(Request $request)
    {
        $awal = $request->awal;
        $akhir = $request->akhir;

        $datas = Transaksi::whereBetween('tanggal', array($awal, $akhir))->get();
        return view('laporan.keuangan', compact('datas', 'awal', 'akhir'));
    }
}
