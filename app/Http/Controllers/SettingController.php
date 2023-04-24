<?php

namespace App\Http\Controllers;

use App\Models\Unker;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function getUnker(Request $request)
    {
        $results_data = getApi('https://epinisi.sulselprov.go.id/api/unit-kerja');
        foreach ($results_data as $value) {
            $data = [
                'id_unit_kerja' => $value['ID_UNIT_KERJA'],
                'name' => $value['NAMA_UNIT_KERJA'],
                'kunker' => $value['KUNKER'],
                'singkatan' => $value['SINGKATAN'],
            ];
            $update = Unker::where('kunker', $value['KUNKER'])->updateOrCreate($data);
        }
        if ($update) {
            return 'berhasil';
        } 
    }
}
