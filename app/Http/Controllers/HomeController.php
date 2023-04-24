<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\DetailPegawai;
use Illuminate\Support\Facades\DB;

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
        $jumlah_pegawai = DetailPegawai::count();
        $pegawai_pemprov = Kegiatan::join('detail_pegawai','kegiatan.id','detail_pegawai.kegiatan_id')->where('kategori','1');
        $pegawai_kabkot = Kegiatan::join('detail_pegawai','kegiatan.id','detail_pegawai.kegiatan_id')->where('kategori','2');
        return view('home',compact('jumlah_pegawai','pegawai_pemprov','pegawai_kabkot'));
    }
}
