@extends('Layout.main')

@section('master')

    <div class="pagetitle">
        <h1>{{ $title }}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Yang Daftar</h5>

                                <!-- Bar Chart -->
                                <canvas id="barChart" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [40, 50, 60, 70, 45, 30, 40, 32, 60, 41, 68, 90],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Right side columns -->
            <div class="col-lg-4">

                <!-- Website Traffic -->
                <div class="card">

                    <div class="card-body pb-0">
                        <h5 class="card-title">Data Dosen Berdasarkan Mata Kuliah</h5>

                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                    tooltip: {
                                        trigger: 'item'
                                    },
                                    legend: {
                                        top: '1%',
                                        left: 'center'
                                    },
                                    series: [{
                                        name: 'Access From',
                                        type: 'pie',
                                        radius: ['50%', '70%'],
                                        avoidLabelOverlap: false,
                                        label: {
                                            show: false,
                                            position: 'center'
                                        },
                                        emphasis: {
                                            label: {
                                                show: true,
                                                fontSize: '18',
                                                fontWeight: 'bold'
                                            }
                                        },
                                        labelLine: {
                                            show: false
                                        },
                                        data: {!!$data->chart_dosen_by_matkul!!}

                                        /*[{
                                                value: 1048,
                                                name: 'Search Engine'
                                            },
                                            {
                                                value: 735,
                                                name: 'Direct'
                                            },
                                            {
                                                value: 580,
                                                name: 'Email'
                                            },
                                            {
                                                value: 484,
                                                name: 'Union Ads'
                                            },
                                            {
                                                value: 300,
                                                name: 'Video Ads'
                                            }
                                        ]*/
                                    }]
                                });
                            });
                        </script>

                    </div>
                </div><!-- End Website Traffic -->

            </div><!-- End Right side columns -->

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Yang Daftar Dalam Bulan</h5>

                                <!-- Bar Chart -->
                                <canvas id="PendaftarBulanan" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#PendaftarBulanan'), {
                                    type: 'line',
                                    data: {
                                        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [31, 20, 10, 45, 67, 24, 48, 89, 89, 91, 11, 50, 12, 43, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Bayar Uang Pendaftaran -->
            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Pendaftaran Per Bulan</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaBayarUangDaftarBulan" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaBayarUangDaftarBulan'), {
                                    type: 'line',
                                    data: {
                                        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [31, 20, 10, 45, 67, 24, 48, 89, 89, 91, 11, 50, 12, 43, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Pendaftaran Dalam Tahun</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaBayarUangDaftarTahub" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaBayarUangDaftarTahub'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [31, 20, 10, 45, 67, 24, 48, 89, 89, 91, 11, 50],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Bayar Heregistrasi -->
            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Heregistrasi Dalam Tahun</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaBayarUangHeregTahun" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaBayarUangHeregTahun'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [31, 20, 10, 45, 67, 24, 48, 89, 89, 91, 11, 50],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Heregistrasi Per Bulan</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaBayarUangHeregBulan" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaBayarUangHeregBulan'), {
                                    type: 'line',
                                    data: {
                                        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [31, 20, 10, 45, 67, 24, 48, 89, 89, 91, 11, 50, 12, 43, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- testing -->
            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Pendaftar Dan Yang Sudah Bayar Pendaftaran</h5>

                                <!-- Bar Chart -->
                                <canvas id="testingChartjs" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#testingChartjs'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"],
                                        datasets: [
                                            {
                                                label: 'Taruna',
                                                data: [31, 20, 10, 45, 67, 24, 48, 89, 89, 91, 11, 50, 12, 43, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30],
                                                backgroundColor: [
                                                    // 'rgba(255, 99, 132, 0.2)',
                                                    // 'rgba(255, 159, 64, 0.2)',
                                                    // 'rgba(255, 205, 86, 0.2)',
                                                    // 'rgba(75, 192, 192, 0.2)',
                                                    // 'rgba(54, 162, 235, 0.2)',
                                                    'rgba(153, 102, 255, 0.2)',
                                                    // 'rgba(201, 203, 207, 0.2)'
                                                ],
                                                borderColor: [
                                                    // 'rgb(255, 99, 132)',
                                                    // 'rgb(255, 159, 64)',
                                                    // 'rgb(255, 205, 86)',
                                                    // 'rgb(75, 192, 192)',
                                                    // 'rgb(54, 162, 235)',
                                                    'rgb(153, 102, 255)',
                                                    // 'rgb(201, 203, 207)'
                                                ],
                                                borderWidth: 1
                                            },
                                            {
                                                label: 'Taruna',
                                                data: [4, 5, 6, 7, 8, 9, 4, 2, 5, 4, 3, 7, 6, 9, 2, 9, 3, 3, 2, 10, 5, 6, 2, 4, 8, 9, 9, 3, 5, 2, 13],
                                                backgroundColor: [
                                                    'rgba(255, 99, 132, 0.2)',
                                                    // 'rgba(255, 159, 64, 0.2)',
                                                    // 'rgba(255, 205, 86, 0.2)',
                                                    // 'rgba(75, 192, 192, 0.2)',
                                                    // 'rgba(54, 162, 235, 0.2)',
                                                    // 'rgba(153, 102, 255, 0.2)',
                                                    // 'rgba(201, 203, 207, 0.2)'
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    // 'rgb(255, 159, 64)',
                                                    // 'rgb(255, 205, 86)',
                                                    // 'rgb(75, 192, 192)',
                                                    // 'rgb(54, 162, 235)',
                                                    // 'rgb(153, 102, 255)',
                                                    // 'rgb(201, 203, 207)'
                                                ],
                                                borderWidth: 1
                                            }
                                        ]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Heregistrasi Berdasarkan Jenis Kelamin -->
            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Heregistrasi Dalam Tahun</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaHeregByGender" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaHeregByGender'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["Laki-laki", "Perempuan"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [231, 220],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Heregistrasi Berdasarkan Prodi -->
            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Heregistrasi By Prodi</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaHeregByProdi" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaHeregByProdi'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["S1 TD", "S1 TE", "D4 MTU", "D3 MT", "D3 AE", "D1 GH", "D1 FA"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [90, 30, 200, 100, 60, 30, 40],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

            <!-- Heregistrasi Berdasarkan Provinsi -->
            <!-- Left side columns -->
            <div class="col-lg-6">
                <div class="row">

                    <!-- Card Bar Chart -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Jumlah Taruna Sudah Bayar Heregistrasi By Provinsi</h5>

                                <!-- Bar Chart -->
                                <canvas id="tarunaHeregByProvinsi" style="max-height: 400px;"></canvas>
                                <script>
                                document.addEventListener("DOMContentLoaded", () => {
                                    new Chart(document.querySelector('#tarunaHeregByProvinsi'), {
                                    type: 'bar',
                                    data: {
                                        labels: ["DIY", "DKI", "Banten", "Jawa Barat", "Jawa Tengah", "Jawa Timur", "Bali", "Kalimantan Selatan", "Sumatra Utara", "Sulawesi Selatan", "Papua"],
                                        datasets: [{
                                        label: 'Taruna',
                                        data: [90, 30, 50, 40, 60, 30, 40, 20, 25, 20, 16],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(255, 159, 64, 0.2)',
                                            'rgba(255, 205, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(201, 203, 207, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgb(255, 99, 132)',
                                            'rgb(255, 159, 64)',
                                            'rgb(255, 205, 86)',
                                            'rgb(75, 192, 192)',
                                            'rgb(54, 162, 235)',
                                            'rgb(153, 102, 255)',
                                            'rgb(201, 203, 207)'
                                        ],
                                        borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                        }
                                    }
                                    });
                                });
                                </script>
                                <!-- End Bar CHart -->

                            </div>
                        </div>
                    </div>

                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>
@endsection
