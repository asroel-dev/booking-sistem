@extends('layouts.app')
@section('title', 'Detail Kegiatan')
@section('content')

    <div id="kt_app_content" class="app-content  flex-column-fluid ">
        <div id="kt_app_content_container" class="app-container  container-fluid ">
            <div class="row mt-5">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col">
                    <div class="card">

                        <div class="container-fluid">
                            <div class="card-header">
                                <div class=" d-flex flex-stack mt-5  ">
                                    <div class="">
                                        <a href="{{ route('kegiatan.kabkot.index') }}" class="btn btn-warning btn-sm mb-3">
                                            <i class="bi bi-arrow-left-short"></i> Kembali</a>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" class="form" action="{{ route('kegiatan.kabkot.update') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" id="" value="{{ $data->id }}">
                            <div class="card-body">
                                <div class=" d-flex flex-column mb-8 fv-row">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Nama Kegiatan</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Masukkan Nama Kegiatan"></i>
                                    </label>
                                    <input type="text" class="form-control form-control-solid"
                                        placeholder="Masukkan Nama Kegiatan" name="nama" required
                                        value="{{ $data->nama }}" />
                                </div>

                                <div class="mb-10">
                                    <label for="required" class="form-label required">Provinsi  <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="Wajib"></i></label>
                                    <select class="form-select form-select-solid" id="provinsi" name="provinsi_id" data-control="select2"  data-placeholder="Pilih Provinsi" data-allow-clear="true" required>
                                        <option></option>
                                        @foreach ($provinsi as $item)
                                        <option value="{{ $item->id_provinsi }}" {{ $item->id_provinsi == $data->provinsi_id ? 'selected' : '' }}>{{ $item->nama_provinsi }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- @if ($data->kabupaten_id) --}}
                                    <div class="mb-10">
                                        <label  class="form-label">Kabupaten/Kota</label>
                                        <select class="form-select form-select-solid" id="kabupaten_kota" name="kabupaten_id" data-control="select2"  data-placeholder="Pilih Kabupaten/Kota" data-allow-clear="true">
                                            <option></option>
                                            @foreach ($kota_kab as $item)
                                            <option value="{{ $item->id_kota_kab }}" {{ $item->id_kota_kab == $data->kabupaten_id ? 'selected' : '' }}>{{ $item->nama_kota_kab }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                {{-- @endif --}}

                                <div class="mb-10">
                                    <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                        <span class="required">Jenis Kegiatan</span>
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Masukkan Nama Kegiatan"></i>
                                    </label>
                                    <div class="d-flex">
                                        <div class="form-check form-check-custom form-check-solid me-10">
                                            <input class="form-check-input  jenisClass" name="jenis" value="1"
                                                type="radio" {{ $data->jenis == '1' ? 'checked' : '' }} id="seleksi" />
                                            <label class="form-check-label fs-6 fw-bold " for="seleksi">
                                                Seleksi Terbuka
                                            </label>
                                        </div>
                                        <div class="form-check form-check-custom form-check-solid me-10">
                                            <input class="form-check-input  jenisClass" name="jenis" value="2"
                                                type="radio" {{ $data->jenis == '2' ? 'checked' : '' }} id="pemetaan" />
                                            <label class="form-check-label fs-6 fw-bold " for="pemetaan">
                                                Pemetaan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div style="{{ $data->jenis == '1' ? 'display: none' : '' }}  " class="subJenis">
                                    <div class="d-flex flex-column mb-8 fv-row">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                            <span class="">Jenis Pemetaan</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="SubJenis"></i>
                                        </label>
                                        <select class="form-control" name="sub_jenis">
                                            <option value="">Pilih Pemetaan</option>
                                            @foreach ($jenis_pemetaan as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $data->sub_jenis ? 'selected' : '' }}>
                                                    {{ $item->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label">waktu</label>
                                    <input class="form-control form-control-solid" placeholder="Pilih Rentang Waktu"
                                        id="kt_daterangepicker_1" name="waktu"
                                        value="{{ dateChange($data->waktu_mulai) }} - {{ dateChange($data->waktu_selesai) }}" />
                                </div>
                                <div class="mb-5">
                                    <div class=" d-flex flex-stack mt-5 mb-5 ">
                                        <div class="">
                                            <button type="submit" class="btn btn-primary btn-sm mb-3"><i
                                                    class="bi bi-save"></i> Simpan Perubahan</button>
                                        </div>
                            </form>
                                        <div class="d-flex align-items-center  ">
                                            <a class="btn btn-primary btn-sm mb-3"
                                                data-bs-toggle="modal" data-bs-target="#addPegawai">
                                                <i class="bi bi-node-plus"></i> Tambah Pegawai</a>
                                        </div>
                                    </div>
                                </div>
                                <table id="kt_datatable_zero_configuration"
                                    class="table table-striped table-row-bordered gy-5 gs-7" width="100%">
                                    <thead>
                                        <tr class="fw-bold ">
                                            <th class="text-center">#</th>
                                            <th class="text-left">Nama Pegawai</th>
                                            <th class="text-left">Unit Kerja</th>
                                            <th class="text-left">Jabatan</th>
                                            <th class="text-left">Nilai</th>
                                            <th class="text-left">Kategori</th>
                                            <th class="text-left">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($detail_pegawai as $item)
                                        <tr class="">
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="text-left"><span class="fs-6 fw-bold">{{ $item->nama }} </span> <br> <p>{{ $item->nip }}  </p>  </td>
                                            <td class="text-left">{{ $item->unker->name ?? $item->kunker}} </td>
                                            <td class="text-left">{{ $item->jabatan }}</td>
                                            <td class="text-left">
                                                @if ($item->nilai)
                                                <span class="text-primary">{{ $item->nilai }}</span>
                                                @else
                                                <span class="text-danger"><em> Belum Dinilai </em></span>
                                                @endif
                                            </td>
                                            <td class="text-left">
                                                @if ($item->nilai)
                                                {{-- @if ($item->nilai => 80)
                                                    MS
                                                @elseif ($item->nilai => 68  )
                                                    KMS
                                                @endif --}}
                                                @if ($item->nilai >= 80)
                                                <span class="badge badge-success">MS</span>
                                                {{-- @endif --}}
                                                @elseif ($item->nilai >= 68 && $item->nilai < 80)
                                                <span class="badge badge-warning">MMS</span>
                                                {{-- @endif --}}
                                                @else
                                                <span class="badge badge-danger">KMS</span>
                                                @endif
                                                {{-- <span class="text-primary">{{ $item->nilai }}</span> --}}
                                                @else
                                                <span class="text-danger"><em> Belum Dinilai </em></span>
                                                @endif
                                            </td>
                                            <td width="20%" class="text-left">
                                                <a  class="btn btn-sm btn-success mr-3" onclick="penilaianClick('{{$item->nip}}')"
                                                data-bs-toggle="modal" data-bs-target="#penilaian">
                                                <i class="bi bi-chat-square-text-fill fs-4 me-2"></i>Penilaian</a>
                                                <button type="button" class="btn btn-sm btn-icon btn-light-danger" onclick="alertHapus({{$item->id}})"><i class="bi bi-trash"></i></button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addPegawai" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Tambah Pegawai</h1>
                    </div>

                    <div class=" d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nama Lengkap</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Masukkan Nama Pegawai"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Masukkan Nama Pegawai" id="nama_pegawai" name="nama_pegawai" required
                            />
                    </div>

                    <div class=" d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">NIP</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Masukkan NIP"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Masukkan NIP" id="nip" name="nip" required
                            />
                    </div>

                    <div class=" d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Jabatan</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Masukkan Jabatan"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Masukkan Jabatan" id="jabatan" name="jabatan" required
                            />
                    </div>

                    <div class=" d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Unit Kerja</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Masukkan Unit Kerja"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Masukkan Unit Kerja" id="kunker" name="kunker" required
                            />
                    </div>
                    <div class="text-center mb-10">
                        <button id="button_tambah" class="btn btn-sm btn-primary w-100">+ Tambah
                        </button>
                    </div>

                    <form method="POST" class="form" action="{{ route('kegiatan.kabkot.pegawai.store') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <table class="table table-striped table-row-bordered gy-5 gs-7 table-row-bordered mb-10"
                            width="100%">
                            <thead>
                                <tr class="fs-6 fw-bold">
                                    <th class="text-left">No</th>
                                    <th class="text-left">Nama Lengkap</th>
                                    <th class="text-left">Jabatan</th>
                                    <th class="text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody id="dataPegawai">
                            </tbody>
                        </table>
                        <input type="hidden" name="kegiatan_id" value="{{ $data->id }}">
                        <button type="submit" class="btn btn-info btn-sm  w-100"><i
                            class="feather icon-save"></i> Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="penilaian" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g transform="translate(12.000000, 12.000000) rotate(-45.000000) translate(-12.000000, -12.000000) translate(4.000000, 4.000000)"
                                    fill="#000000">
                                    <rect fill="#000000" x="0" y="7" width="16" height="2"
                                        rx="1" />
                                    <rect fill="#000000" opacity="0.5"
                                        transform="translate(8.000000, 8.000000) rotate(-270.000000) translate(-8.000000, -8.000000)"
                                        x="0" y="7" width="16" height="2" rx="1" />
                                </g>
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <div class="mb-13 text-center">
                        <h1 class="mb-3">Penilaian Pegawai</h1>
                    </div>

                <form method="POST" class="form" action="{{ route('kegiatan.kabkot.penilaian.update') }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex flex-column">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="">Data Pegawai</span>
                        </label>
                        <input type="hidden" name="kegiatan_id" id="idPenilaian" >
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control form-control-solid" id="namaPenilaian" disabled value="" />
                            <label for="floatingInput1">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-2">
                            <input type="text" class="form-control form-control-solid" name="nip_penilaian" id="nipPenilaian" readonly value=""/>
                            <label for="floatingInput1">NIP</label>
                        </div>

                        <div class="form-floating mb-2">
                            <input type="text" class="form-control form-control-solid" id="jabatanPenilaian" disabled value=""/>
                            <label for="floatingInput1">Jabatan</label>
                        </div>
                        <div class="form-floating mb-10">
                            <input type="text" class="form-control form-control-solid"  name="kunker_penilaian" id="kunkerPenilaian" disabled value=""/>
                            <label for="floatingInput1">Unit Kerja</label>
                        </div>
                    </div>

                    <div class=" d-flex flex-column mb-8 fv-row">
                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                            <span class="required">Nilai</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                title="Masukkan Nilai"></i>
                        </label>
                        <input type="text" class="form-control form-control-solid"
                            placeholder="Masukkan Nilai" id="nilaiPenilaian" name="nilai" required
                            />
                    </div>

                    <div class="text-center mb-10">
                        <button id="button_tambah" class="btn btn-sm btn-primary w-100">+ Simpan
                        </button>
                    </div>
                </form>


                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        $("#kt_daterangepicker_1").daterangepicker();

        $(".jenisClass").click(function() {
            if ($("input[type='radio'].jenisClass").is(':checked')) {
                let value = $("input[type='radio'].jenisClass:checked").val();
                if (value == 2) {
                    $(".subJenis").show();
                } else {
                    $(".subJenis").hide();

                }
            }
        })


        let count = 0;
            $('#button_tambah').click(function() {
                event.preventDefault()
                $nama = $('#nama_pegawai').val();
                $nip = $('#nip').val();
                $jabatan = $('#jabatan').val();
                $kunker = $('#kunker').val();
                if ($nip) {
                    $.ajax({
                        data: {
                            count: count++,
                        },
                        success: function(data) {
                            $('#dataPegawai').append('<tr id="' + count + '">' +
                                '<td >' + count + '.</td>' +
                                '<td > <span class="text-dark fw-bold">' + $nama + '</span> <br> <p> ' + $nip + ' </p> </td>' +
                                '<td >' + $jabatan + '</td>' +
                                '<td style="display : none"><input  type="text" name="nip[]" value="' +$nip+'" readonly></td>' +
                                '<td style="display : none"><input  type="text" name="nama[]" value="' +$nama+'" readonly></td>' +
                                '<td style="display : none"><input  type="text" name="jabatan[]" value="' +$jabatan+'" readonly></td>' +
                                '<td style="display : none"><input  type="text" name="kunker[]" value="' +$kunker+'" readonly></td>' +
                                '<td class="text-center" ><button type="button" class="btn btn-icon btn-light-danger" onclick="onClickHapus(' +
                                count + ')"><i class="bi bi-trash"></i></button></td>' +
                                '</tr>');
                            $('#pegawai').val('');
                        }
                    });
                }
            });

            function alertHapus(id) {
                Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menghapus Pegawai!",
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                        showCancelButton: true,
                        confirmButtonColor: '#2cc783',
                        cancelButtonColor: '#e0e0e0',
                        confirmButtonText: 'Yes, delete it!'
                    })
                    .then((result) => {
                        if (result.value) {
                            hapus(id);
                        } else {
                            swal.fire("Data tidak terhapus!");
                        }

                    })
            }

            function hapus(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('kegiatan.kabkot.pegawai.destroy') }}",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                beforeSend: function() {
                    Swal.fire({
                        title: 'Mohon Tunggu',
                        icon: 'warning',
                        showCancelButton: false,
                        showConfirmButton: false
                    });
                },
                success: function(data) {
                    console.log(data);
                    Swal.fire({
                        title: 'Success',
                        text: data.message,
                        icon: 'success',
                    });
                    setTimeout(() => {
                        location.reload()
                    }, 2000);
                },
                error: function() {}
            })
        }

            function onClickHapus(count) {
                console.log(count);
                $('#' + count).remove();
            }

            $("#provinsi").change(function() {
            let val = $(this).val();
            $.ajax({
                url: "{{ route('kegiatan.provinsi.kabkota.get') }}",
                method: "GET",
                data: {
                    id: val
                },
                success: function(data) {
                    $("#kabupaten_kota").html(data)
                }
            })
        })

        function penilaianClick(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('kegiatan.kabkot.pegawai.get_detail') }}",
                method: "GET",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#idPenilaian').val(data.id);
                    $('#nilaiPenilaian').val(data.nilai);
                    $('#namaPenilaian').val(data.nama);
                    $('#nipPenilaian').val(data.nip);
                    $('#jabatanPenilaian').val(data.jabatan);
                    $('#kunkerPenilaian').val(data.kunker);
                },
                error: function() {}
            })
        }
    </script>
@endpush
