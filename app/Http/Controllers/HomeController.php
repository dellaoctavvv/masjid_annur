<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Acara;
use App\User;
use App\Transaksi;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $awal = date('Y-m-01');
        $akhir = date('Y-m-31');
        $tahun = date('Y');
        $acara = Acara::whereBetween('tanggal', array($awal, $akhir))->count();
        $pengeluaran = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                    ->where('jenis','Pengeluaran')
                    ->select(DB::raw('sum(kredit) as kredit'))
                    ->first();
        $pemasukan = Transaksi::whereBetween('tanggal', array($awal, $akhir))
                    ->where('jenis','Pemasukan')
                    ->select(DB::raw('sum(debit) as debit'))
                    ->first();

        $data = [];
        $max = 0;
        for ($i=1; $i <=12 ; $i++) {
            $tanggal = ($i<9) ? '0'.$i : $i ;
            $tamp = Transaksi::select(DB::raw('sum(debit - kredit) as saldo'))
                    ->where('tanggal', 'like', '%' . $tahun .'-'. $tanggal . '%')
                    ->first();
            $tampdata = ($tamp->saldo == null) ? 0 : $tamp->saldo ;
            $max = ($max < $tampdata) ? $tampdata : $max ;
            $data[$i - 1] = $tampdata;
        }
        return view('home', compact('acara','pengeluaran','pemasukan', 'data', 'max'));
    }

    public function change(Request $request)
    {
        $panjang = strlen($request->baru);
        if($panjang < 6){
            return redirect()
                ->back()
                ->with('error', 'Password kurang dari 6 character.');
        }

        $admin = User::findOrFail(Auth::user()->id);

        if (Hash::check($request->lama, $admin->password)) {
            $admin->password = Hash::make($request->baru);
            $admin->save();
            return redirect('/home')
                ->with('success', 'Berhasil Diubah.');
        }
        return redirect()
            ->back()
            ->with('error', 'Password sebelumnya tidak sama.');
    }
}
