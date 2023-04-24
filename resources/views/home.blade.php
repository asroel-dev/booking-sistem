@extends('layouts.app')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <h1></h1>
            &nbsp;
            <div class="row g-5 g-xl-8">
                <div class="col-xl-3">
                    <a href="" class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M2 16C2 16.6 2.4 17 3 17H21C21.6 17 22 16.6 22 16V15H2V16Z"
                                        fill="black" />
                                    <path opacity="0.3" d="M21 3H3C2.4 3 2 3.4 2 4V15H22V4C22 3.4 21.6 3 21 3Z"
                                        fill="black" />
                                    <path opacity="0.3" d="M15 17H9V20H15V17Z" fill="black" />
                                </svg></span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Jumlah Pegawai</div>
                            <div class="fw-bold text-gray-400 mb-3">Total Jumlah Pegawai</div>

                            <div>
                                <h1>{{$jumlah_pegawai}}</h1>
                            </div>

                        </div>
                    </a>
                </div>

                <div class="col-xl-3">
                    <a href="" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Assesment Pemprov</div>
                            <div class="fw-bold text-gray-900 mb-3">Total Assesment Pemprov</div>
                            <div>
                                <h1>{{ $pegawai_pemprov->count() }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3">
                    <a href="" class="card bg-warning hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <span class="svg-icon svg-icon-white svg-icon-3x ms-n1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path
                                        d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                        fill="black" />
                                    <path opacity="0.3"
                                        d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Assesment Kab/Kota</div>
                            <div class="fw-bold text-gray-900 mb-3">Total Assesment Kab/Kota</div>
                            <div>
                                <h1>{{ $pegawai_kabkot->count() }}</h1>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
