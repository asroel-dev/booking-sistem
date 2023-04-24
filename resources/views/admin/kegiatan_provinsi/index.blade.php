@extends('layouts.app')
@section('title', 'Kegiatan')
@section('content')
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
                <div class="card-body">
                    <button class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahGambar">+
                        Kegiatan Provinsi</button>
                    <table id="kt_datatable_zero_configuration" class="table table-striped table-row-bordered gy-5 gs-7"
                        width="100%">
                        <thead>
                            <tr class="fw-bold ">
                                <th class="text-center">#</th>
                                <th class="text-left">Nama Kegiatan</th>
                                <th class="text-left">Jenis</th>
                                <th class="text-left">Waktu</th>
                                <th class="text-left">Jumlah Peserta</th>
                                <th class="text-left">Action</th>
                                <th class="text-left">File</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahGambar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog mw-650px">
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
                    <form method="POST" class="form" action="{{ route('kegiatan.provinsi.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Tambah Kegiatan</h1>
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama Kegiatan</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama Kegiatan"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Masukkan Nama Kegiatan" name="nama" required />
                        </div>


                        <div class="mb-10">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Jenis Kegiatan</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama Kegiatan"></i>
                            </label>
                            <div class="d-flex">
                                <div class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input  jenisClass" name="jenis" value="1" type="radio"
                                        id="seleksi" />
                                    <label class="form-check-label fs-6 fw-bold " for="seleksi">
                                        Seleksi Terbuka
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid me-10">
                                    <input class="form-check-input  jenisClass" name="jenis" value="2" type="radio"
                                        id="pemetaan" />
                                    <label class="form-check-label fs-6 fw-bold " for="pemetaan">
                                        Pemetaan
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div style="display: none" class="subJenis">
                            <div class="d-flex flex-column mb-8 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                    <span class="">Jenis Pemetaan</span>
                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                        title="SubJenis"></i>
                                </label>
                                <select class="form-control" name="sub_jenis">
                                    <option value="">Pilih Pemetaan</option>
                                    <option value="1">Administrasi</option>
                                    <option value="2">Pengawas</option>
                                    <option value="3">Pelaksana</option>
                                    <option value="4">Fungsional</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-5">
                            <label class="form-label">waktu</label>
                            <input class="form-control form-control-solid" placeholder="Pilih Rentang Waktu" id="kt_daterangepicker_1" name="waktu" />
                        </div>

                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" class="btn btn-primary">Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="fileKegiatan" tabindex="-1" aria-hidden="true">
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
                    <form method="POST" class="form" action="{{ route('kegiatan.provinsi.file.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">File Kegiatan Prov</h1>
                        </div>
                        <div class="alert alert-dismissible bg-light-primary d-flex flex-column flex-sm-row p-5 mb-10">
                            <i class="ki-duotone ki-notification-bing fs-2hx text-primary me-4 mb-5 mb-sm-0"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <div class="d-flex flex-column pe-0 pe-sm-10">
                                <h4 class="fw-semibold">Maksimal 4 File </h4>
                                <span>Setiap Kegiatan Maksimal File yang dapat diupload adalah 4 buah File</span>
                            </div>
                            <button type="button"
                                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                data-bs-dismiss="alert">
                                <i class="ki-duotone ki-cross fs-1 text-primary"><span class="path1"></span><span
                                        class="path2"></span></i>
                            </button>
                        </div>

                        <table class="table table-striped table-row-bordered gy-5 gs-7 table-row-bordered mb-10"
                            width="100%">
                            <thead>
                                <tr class="fs-6 fw-bold">
                                    <th class="text-left">Nama File</th>
                                    <th class="text-left">File</th>
                                    <th class="text-left">Action</th>
                                </tr>
                            </thead>
                            <tbody id="filedata">
                            </tbody>
                        </table>

                        <input type="hidden" id="kegiatan_id" name="kegiatan_id" value="">
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama File</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama File"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Masukkan Nama File" name="name" required autocomplete="off" />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">File</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="File"></i>
                            </label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="fileEdit"
                                name="file" required>
                        </div>

                        <div class="text-center">
                            <button type="reset" class="btn btn-light me-3">Cancel</button>
                            <button type="submit" class="btn btn-primary">Simpan
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

        $(document).ready(function() {
            load_data();

            function load_data(unit = '') {
                $('#kt_datatable_zero_configuration').DataTable({
                    "pageLength": 10,
                    "processing": true,
                    "serverside": true,
                    "scrollX": true,
                    "language": {
                        "processing": 'Memuat...'
                    },
                    "serverSide": true,
                    "ajax": {
                        url: "",
                        data: {
                            unit: unit,
                        }
                    },
                    "columns": [{
                            "data": "DT_RowIndex",
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            "data": "nama",
                        },
                        {
                            "data": "jenis",
                        },
                        {
                            "data": "waktu",
                        },
                        {
                            "data": "jumlah_peserta",
                        },
                        {
                            "data": "aksi",
                            "orderable": false,
                            "searchable": false
                        },
                        {
                            "data": "file",
                        },
                    ],
                    "bAutoWidth": false,
                    "columnDefs": [{
                        targets: [0, 1, 2],
                        className: 'text-center'
                    }],
                    "bDestroy": true,
                });
            }

        });


        function fileData(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('kegiatan.provinsi.file.edit') }}",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#filedata').html(data);
                    $('#kegiatan_id').val(id);
                },
                error: function() {}
            })
        }

        function alertHapus(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus Kegiatan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya'
            }).then((result) => {
                if (result.isConfirmed) {
                    hapus(id);
                }
            })
        }



        function alertHapusFile(id) {
                Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Anda akan menghapus File!",
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
                            hapusFile(id);
                        } else {
                            swal.fire("Data tidak terhapus!");
                        }

                    })
            }

            function hapusFile(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('kegiatan.provinsi.file.destroy') }}",
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

        function hapus(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('kegiatan.provinsi.destroy') }}",
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
    </script>
@endpush
