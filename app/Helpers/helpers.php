
<?php

function getApi($url, $array = [], $method = 'GET')
	{
		$curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
			CURLOPT_POSTFIELDS => $array,
			  CURLOPT_HTTPHEADER => array(
				'Content-Type: application/json'
			  ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

			return json_decode($response, true);
	}

    function getPegawai($url)
	{
		$curl = curl_init();

            curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            ));
            $response = curl_exec($curl);
            curl_close($curl);

			return $response;

	}

    function unker_update(Request $request)
    {
        // $client = new Client();
        // $api_request = $client->post('https://epinisi.sulselprov.go.id/api/unit-kerja');
        // $results_data = json_decode($api_request->getBody(), true);

        $results_data = Helper::getApi('https://epinisi.sulselprov.go.id/api/unit-kerja');

        return $results_data;
    }

function getHari($hari)
{
    switch ($hari) {
        case 'Sunday':
            return 'Minggu';
        case 'Monday':
            return 'Senin';
        case 'Tuesday':
            return 'Selasa';
        case 'Wednesday':
            return 'Rabu';
        case 'Thursday':
            return 'Kamis';
        case 'Friday':
            return 'Jumat';
        case 'Saturday':
            return 'Sabtu';
        default:
            return 'hari tidak valid';
    }
}

function changeDate($date)
{
    return date("d-m-Y", strtotime($date));
}

function dateChange($dateFromDatabase)
{
    $carbonDate = \Carbon\Carbon::parse($dateFromDatabase);
    $formattedDate = $carbonDate->format('m/d/Y');
    # code...
    return $formattedDate;
}

function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}

function jenis($id)
{
    switch ($id) {
        case '1':
            return "<span class='badge badge-primary'>Seleksi Terbuka</span>";
            break;
        case '2':
            return "<span class='badge badge-success'>Pemetaan</span>";
            break;
        default:
            break;
    }
}

function get_bulan($tanggal)
	{
		$bulan = array(
			1 =>   'Januari',
			'Februari',
			'Maret',
			'April',
			'Mei',
			'Juni',
			'Juli',
			'Agustus',
			'September',
			'Oktober',
			'November',
			'Desember'
		);
		$pecahkan = explode('-', $tanggal);

		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun

		return $bulan[(int)$pecahkan[1]]  ;
	}

    function tanggalIndo($date)
{
    $tgl = date('d', strtotime($date));
    $bulan = date('m', strtotime($date));
    $tahun = date('Y', strtotime($date));

    return $tgl . " " . bulan($bulan) . " " . $tahun;
}


function jam_indo($tanggal)
{
    return $tanggal ? date("H:i", strtotime("$tanggal")) : "00:00";
}