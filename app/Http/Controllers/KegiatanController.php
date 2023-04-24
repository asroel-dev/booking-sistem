<?php

namespace App\Http\Controllers;

use Alert;
use Carbon\Carbon;
use App\Models\Unker;
use GuzzleHttp\Client;
use App\Models\Pegawai;
use App\Models\Kegiatan;
use Illuminate\Support\Str;
use App\Models\Filekegiatan;
use Illuminate\Http\Request;
use App\Models\DetailPegawai;
use App\Models\JenisPemetaan;
use Yajra\DataTables\DataTables;


class KegiatanController extends Controller
{

    public function get_pegawai_detail(Request $request)
    {
        $nip = request('id');
        $data = DetailPegawai::where('nip', $nip)->first();

        return response()->json($data, 200);
    }

    public function penilaian_update(Request $request)
    {

        $this->validate($request, [
            'kegiatan_id' => 'required',
            'nip_penilaian' => 'required',
            'nilai' => 'required',
        ]);

        $kegiatan_id = $request->kegiatan_id;
        $nip = $request->nip_penilaian;
        $data = [
            'nilai' => $request->nilai,
        ];

        DetailPegawai::where('id', $kegiatan_id)->where('nip', $nip)->update($data);
        toast('Berhasil Di Update', 'success');
        return redirect()->back();
    }


    public function get_pegawai(Request $request)
    {
        $kunker = request('id');
        $cek = Pegawai::where('kunker',$kunker)->first();
        if ($cek) {
            $today = date('d-m-Y');
            if (changeDate($cek->updated_at) != $today) {
                $results_data = getPegawai("https://epinisi.sulselprov.go.id/api/pegawai?size=200&page=0&unit=$kunker");
                $result = json_encode($results_data);
                $data = [
                    'kunker' => $kunker,
                    'data' => $results_data,
                ];
                Pegawai::where('kunker',$kunker)->update($data);
                $cek = Pegawai::where('kunker',$kunker)->first();
                $results_data = json_decode($cek->data);
                $send = "<option selected disabled value=''>-- Pilih --</option>";
                foreach ($results_data as $k => $p) {
                    $send .= '<option value="'. $p->NJab.'#'.$kunker.'#'.$p->nipbaru.'#'.$p->nama.'">'.$p->gldepan. $p->nama .$p->glblk.' - '.$p->nipbaru.'</option>';
                }
                return response()->json($send);
            }else{
                $results_data = json_decode($cek->data);
                $send = "<option selected disabled value=''>-- Pilih --</option>";
                foreach ($results_data as $k => $p) {
                    $send .= '<option value="'. $p->NJab.'#'.$kunker.'#'.$p->nipbaru.'#'.$p->nama.'">'.$p->gldepan.' '.$p->nama .$p->glblk.' - '.$p->nipbaru.'</option>';
                }
                return response()->json($send);
            }
        } else {
            $results_data = getPegawai("https://epinisi.sulselprov.go.id/api/pegawai?size=200&page=0&unit=$kunker");
            $result = json_encode($results_data);
            $data = [
                'kunker' => $kunker,
                'data' => $results_data,
            ];
            Pegawai::create($data);
            $cek = Pegawai::where('kunker',$kunker)->first();
            $results_data = json_decode($cek->data);
            $send = "<option selected disabled value=''>-- Pilih --</option>";
            foreach ($results_data as $k => $p) {
                $send .= '<option value="'. $p->NJ.'#'.$kunker.'#'.$p->nipbaru.'#'.$p->nama.'">'.$p->gldepan. $p->nama .$p->glblk.' - '.$p->nipbaru.'</option>';
            }
            return response()->json($send);
        }
    }

    public function store_pegawai(Request $request)
    {

        $data = $request->validate([
            'kegiatan_id'  => 'required',
            'nip'          => 'required',
            'nama'         => 'required',
            'kunker'       => 'required',
            'jabatan'      => 'required',
        ]);


        $kegiatan_id = $data['kegiatan_id'];
        $nip = $data['nip'];
            for ($i = 0; $i < count($nip); $i++) {
                $data = [
                    'kegiatan_id'     => $kegiatan_id,
                    'nip'          => $request->nip[$i],
                    'nama'          => $request->nama[$i],
                    'kunker'          => $request->kunker[$i],
                    'jabatan'          => $request->jabatan[$i],
                ];
                DetailPegawai::create($data);
            }

            toast('Pegawai Berhasil Di Tambah', 'success');
            return redirect()->route('kegiatan.provinsi.detail',$kegiatan_id);
    }
    
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Kegiatan::where('kategori','1')->orderByDesc('id')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('nama', function ($data) {
                    $judul = $data->nama;
                    return $judul;
                })
                ->editColumn('jenis', function ($data) {
                    $jenis = jenis($data->jenis);
                    return $jenis;
                })
                ->editColumn('waktu', function ($data) {
                    $waktu = tanggalIndo($data->waktu_mulai) .' - '. tanggalIndo($data->waktu_selesai) ;
                    return $waktu;
                })
                ->editColumn('jumlah_peserta', function ($data) {
                    if ($data->pegawai) {
                       return $data->pegawai->count() .' Orang';
                    } else {
                        return '-';
                    }
                })
                ->editColumn('aksi', function ($data) {
                    $actionButton = '
                  <a href="'. route('kegiatan.provinsi.detail', $data->id) .'" class="btn waves-effect waves-light btn-warning btn-sm" >
                         <i class="bi bi-pencil-square"></i> Detail
                    </a>
                     <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="alertHapus(&quot;' . $data->id . '&quot;)">
                         <i class="bi bi-trash"></i>
                    </button>';
                    return $actionButton;
                })
                ->editColumn('file', function ($data) {
                    $actionButton = '
                    <button class="btn waves-effect waves-light btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#fileKegiatan" onclick="fileData(&quot;' . $data->id. '&quot;)">
                         <i class="bi bi-file-earmark-pdf"></i> Lihat File
                    </button>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }
        return view('admin.kegiatan_provinsi.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'waktu' => 'required',
            'jenis' => 'required',
            'sub_jenis' => 'nullable',
        ]);

        $waktu_mulai = explode(' - ' ,$request->waktu);
        $start_date_str = $waktu_mulai[0];
        $end_date_str = $waktu_mulai[1];
        $start_date = Carbon::createFromFormat('m/d/Y', $start_date_str);
        $end_date = Carbon::createFromFormat('m/d/Y', $end_date_str);

        $data = [
            'kategori' => 1,
            'nama' => $request->nama,
            'waktu_mulai' => $start_date,
            'waktu_selesai' => $end_date,
            'jenis' => $request->jenis,
            'sub_jenis' => $request->sub_jenis,
        ];

        Kegiatan::create($data);
        toast('Kegiatan Berhasil Di Tambah', 'success');
        return redirect()->route('kegiatan.provinsi.index');
    }

    public function detail($id_kegiatan)
    {
        $data = Kegiatan::where('id', $id_kegiatan)->firstOrFail();
        $jenis_pemetaan = JenisPemetaan::get();
        $unit_kerja = Unker::get();
        $detail_pegawai = DetailPegawai::where('kegiatan_id', $id_kegiatan)->get();
        return view('admin.kegiatan_provinsi.detail', compact('data','jenis_pemetaan','unit_kerja','detail_pegawai'));
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required',
            'waktu' => 'required',
            'jenis' => 'required',
            'sub_jenis' => 'nullable',
        ]);

        $waktu_mulai = explode(' - ' ,$request->waktu);
        $start_date_str = $waktu_mulai[0];
        $end_date_str = $waktu_mulai[1];
        $start_date = Carbon::createFromFormat('m/d/Y', $start_date_str);
        $end_date = Carbon::createFromFormat('m/d/Y', $end_date_str);
        
        $kegiatan_id = $request->id;
        $data = [
            'kategori' => 1,
            'nama' => $request->nama,
            'waktu_mulai' => $start_date,
            'waktu_selesai' => $end_date,
            'jenis' => $request->jenis,
            'sub_jenis' => $request->sub_jenis,
        ];

        // dd($data);
        
        Kegiatan::where('id', $kegiatan_id)->update($data);
        toast('Berhasil Di Update', 'success');
        return redirect()->route('kegiatan.provinsi.detail', $kegiatan_id);
    }

    public function store_file(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'kegiatan_id' => 'required',
            'file' => 'mimes:pdf',
        ]);

        $data = [
            'kegiatan_id' => $request->kegiatan_id,
            'name' => $request->name,
        ];

        if ($request->has('file')) {
            $file = $request->file;
            $fileName = time() . $file->getClientOriginalName();
            $file->move('uploads/file', $fileName);
            $data['file'] = $fileName;
        }

        Filekegiatan::create($data);
        toast('File Berhasil Di Tambah', 'success');
        return redirect()->route('kegiatan.provinsi.index');
    }

    public function edit_file(Request $request)
    {
        $id = $request->id;
        $data = Filekegiatan::where('kegiatan_id', $id)->get();
        $semua_data ='';
        if (!$data->isEmpty()) {
            foreach ($data as $item) {
                $semua_data .= '
                <tr>
                    <td>'. $item->name .'</td>
                    <td> <a href="/uploads/file/'. $item->file .'" target="_blank" >Lihat File</a></td>
                    <td>
                        <a class="btn btn-icon   btn-light-danger " onclick="alertHapusFile(&quot;' . $item->id . '&quot;)">
                            <i class="bi bi-trash"></i>
                        </a>
                    </td>
                </tr>';
            }
        } else {
            $semua_data .='
            <tr>
               <td colspan="3" class="text-center"> Belum ada File</td>
            </tr>
           ';
        }
        echo $semua_data;
    }

    public function destroy_pegawai(Request $request)
    {
        $id = $request->id;
        $data = DetailPegawai::where('id', $id)->delete();
        if ($data) {
            return response()->json(['message' => 'Pegawai Berhasil Di Hapus'], 200);
        } else {
            return response()->json(['message' => 'Error'], 200);
        }
    }

    public function destroy_file(Request $request)
    {
        $id = $request->id;
        $data = Filekegiatan::where('id', $id)->delete();
        // Filekegiatan::where('id', $id)->delete();

        if ($data) {
            return response()->json(['message' => 'File Berhasil Di Hapus'], 200);
        } else {
            return response()->json(['message' => 'Error'], 200);
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Kegiatan::where('id', $id)->delete();

        if ($data) {
            return response()->json(['message' => 'Kegiatan Berhasil Di Hapus'], 200);
        } else {
            return response()->json(['message' => 'Error'], 200);
        }
    }
}
