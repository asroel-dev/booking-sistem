@extends('panel.layouts.app')
@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <div id="kt_content_container" class="container-xxl">
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
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Total Inovasi</div>
                                <div class="fw-bold text-gray-400 mb-3">Jumlah Proposal Inovasi Yang Telah Masuk</div>

                                <div>
                                    <h1></h1>
                                </div>

                            </div>
                        </a>
                    </div>
                    @role('admin')
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
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Proposal Draft</div>
                                <div class="fw-bold text-gray-900 mb-3">Proposal Inovasi Draft</div>
                                <div>
                                    <h1></h1>
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
                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Proposal Kirim</div>
                                <div class="fw-bold text-gray-900 mb-3">Proposal Inovasi yang telah di kirim</div>
                                <div>
                                    <h1></h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3">
                        <a href="" class="card bg-success hoverable card-xl-stretch mb-xl-8">
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


                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Proposal Approved</div>
                                <div class="fw-bold text-gray-900 mb-3">Proposal Inovasi yang telah di Approved</div>
                                <div>
                                    <h1></h1>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3">
                        <a href="" class="card bg-danger hoverable card-xl-stretch mb-xl-8">
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


                                <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Proposal Perbaikan</div>
                                <div class="fw-bold text-gray-900 mb-3">Proposal Inovasi Perbaikan</div>
                                <div>
                                    <h1></h1>
                                </div>
                            </div>
                        </a>
                    </div>


                    @endrole
                </div>


            </div>
        </div>
    </div>
@endsection

@push('script')


<script>
    $(document).ready(function(){
        $('#datatable').DataTable({
            lengthChange: false,
            paging: false,
            searching: false,
            scrollCollapse: true,
            scrollY: '50vh',
        });
    });

var options = {
          series: [{
          name: 'Net Profit',
          data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
          name: 'Revenue',
          data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
          name: 'Free Cash Flow',
          data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
          chart: {
          type: 'bar',
          height: 550
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '55%',
            endingShape: 'rounded'
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: {!! json_encode($label) !!},
        },
        yaxis: {
          title: {
            text: '$ (thousands)'
          }
        },
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();



</script>
@endpush
