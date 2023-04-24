@extends('layouts.app')
@section('title', 'User')
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
                    <button class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#tambahUser">+
                        User Pengguna</button>
                    <table id="kt_datatable_zero_configuration" class="table table-striped table-row-bordered gy-5 gs-7"
                        width="100%">
                        <thead>
                            <tr class="fw-bold ">
                                <th class="text-center">No</th>
                                <th class="text-left">Nama Lengkap</th>
                                <th class="text-left">Email</th>
                                <th class="text-left">Role</th>
                                <th class="text-left">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahUser" tabindex="-1" aria-hidden="true">
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
                    <form method="POST" class="form" action="{{ route('user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Tambah User</h1>
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama User</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama User"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                @error('name') is-invalid @enderror placeholder="Masukkan Nama User" name="name"
                                required />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Email</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Email"></i>
                            </label>
                            <input type="email" class="form-control form-control-solid"
                                @error('email') is-invalid @enderror placeholder="Masukkan Email" name="email" required />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="">Role Pengguna</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="role"></i>
                            </label>
                            <select class="form-control" name="role">
                                <option value="">Pilih Role Pengguna</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Pengguna</option>
                            </select>
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Password</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Password"></i>
                            </label>
                            <input type="password" class="form-control form-control-solid"
                                @error('password') is-invalid @enderror placeholder="Masukkan Password" name="password"
                                required autocomplete="new-password" />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Konfirmasi Password</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Password"></i>
                            </label>
                            <input type="password" class="form-control form-control-solid" placeholder="Masukkan Password"
                                name="password_confirmation" required autocomplete="new-password" />
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

    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
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
                    <form method="POST" class="form" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Edit User</h1>
                        </div>
                        <input type="hidden" value="" name="user_id" id="idEdit">

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Nama User</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Nama User"></i>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                @error('name') is-invalid @enderror placeholder="Masukkan Nama User" name="name" id="nameEdit"
                                required />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Email</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Email"></i>
                            </label>
                            <input type="email" class="form-control form-control-solid"
                                @error('email') is-invalid @enderror placeholder="Masukkan Email" name="email"  id="emailEdit"
                                 required />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="">Role Pengguna</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="role"></i>
                            </label>
                            <select class="form-control" name="role"  id="roleEdit" >
                                <option value="">Pilih Role Pengguna</option>
                                <option value="1">Super Admin</option>
                                <option value="2">Pengguna</option>
                            </select>
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Password</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Password"></i>
                            </label>
                            <input type="password" class="form-control form-control-solid"
                                @error('password') is-invalid @enderror placeholder="Masukkan Password" name="password"
                                 autocomplete="new-password" />
                        </div>

                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-bold mb-2">
                                <span class="required">Konfirmasi Password</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Masukkan Password"></i>
                            </label>
                            <input type="password" class="form-control form-control-solid" placeholder="Masukkan Password"
                                name="password_confirmation"  autocomplete="new-password" />
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
                            "data": "name",
                        },
                        {
                            "data": "email",
                        },
                        {
                            "data": "role",
                        },
                        {
                            "data": "aksi",
                            "orderable": false,
                            "searchable": false
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


        function alertHapus(id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan menghapus User",
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

        function editData(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('user.edit') }}",
                method: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    console.log(data);
                    $('#idEdit').val(data.id);
                    $('#nameEdit').val(data.name);
                    $('#emailEdit').val(data.email);
                    $('#roleEdit').val(data.role);
                },
                error: function() {}
            })
        }

        function hapus(id) {
            var _token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('user.destroy') }}",
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
    </script>
@endpush
