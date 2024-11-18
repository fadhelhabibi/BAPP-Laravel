@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-2 d-flex justify-content-center">
                        <img class="img-profile rounded-circle img-3x4 mt-3" 
                             src="{{ auth()->user()->fotoprofil ? asset(auth()->user()->fotoprofil) : asset('img/fany.PNG') }}" 
                             style="width: 180px; height: 180px; object-fit: cover;">
                    </div>
                    <div class="col-md-10 mt-3">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="text-dark font-weight-bold">Selamat Pagi, {{ auth()->user()->nama }}</h4>
                                <p class="text-muted" style="font-size: 14px;">Sekarang hari minggu, 17 November 2024</p>
                            </div>
                            <div>
                                <a href="{{ route('dashboard') }}" class="btn mb-3" style="background-color: #2696d2; color: white; font-size: 14px;"><i class="fas fa-sync"></i> Refresh</a>
                            </div>
                        </div>
                        <b><p class="text-dark" style="font-size: 14px;">Menu Cepat</p></b>
                        <div class="row">
                            <div class="col-3">
                                <a href="{{ route('varcost') }}" class="btn mb-3 btn-block" style="background-color: #2696d2; color: white; font-size: 14px;">Informasi Varcost</a>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('somsa') }}" class="btn mb-3 btn-block" style="background-color: #2696d2; color: white; font-size: 14px;">Informasi Somsa</a>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('pw') }}" class="btn mb-3 btn-block" style="background-color: #2696d2; color: white; font-size: 14px;">Informasi Pw</a>
                            </div>
                            <div class="col-3">
                                <a href="{{ route('dashboard') }}" class="btn mb-3 btn-block" style="background-color: #2696d2; color: white; font-size: 14px;">Informasi Expense Me</a>
                            </div>
                        </div>
                        <b><p class="text-dark" style=" font-size: 14px;">Lengkapi profil anda, hubungi tim Triple-E untuk perubahan data</p></b>
                    </div>
                </div>              
            </div>
        </div>
    </div>
</div>

<h5 class="text-dark">Informasi BAPP</h5>

<div class="row mt-4">
    <!-- Total User Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total User</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalUser }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Variable Cost Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Variable Cost</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalVarcost }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Somsa Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Somsa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalSomsa }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total PW Card -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total PW</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalPw }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Ambil konteks dari canvas
    var ctx = document.getElementById("myDonutChart").getContext("2d");

    // Data dari Laravel
    var data = {
        labels: ["User", "Varcost", "Somsa", "PW"],
        datasets: [{
            data: [
                {{ $totalUser }},
                {{ $totalVarcost }},
                {{ $totalSomsa }},
                {{ $totalPw }}
            ],
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#dda20a'],
            hoverBorderColor: "rgba(234, 236, 244, 1)"
        }]
    };

    var options = {
        maintainAspectRatio: false,
        tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
        },
        legend: {
            display: false
        },
        cutoutPercentage: 80,
    };

    // Buat Donut Chart
    new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
    });
</script>  

<script>
    var months = @json($months);
    var userCounts = @json($userCounts);
    var varcostCounts = @json($varcostCounts);

    var ctx = document.getElementById("myAreaChart").getContext('2d');
    var myAreaChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: "User",
                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: userCounts, // Data user
            },
            {
                label: "Varcost",
                lineTension: 0.3,
                backgroundColor: "rgba(28, 200, 138, 0.05)",
                borderColor: "rgba(28, 200, 138, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(28, 200, 138, 1)",
                pointBorderColor: "rgba(28, 200, 138, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(28, 200, 138, 1)",
                pointHoverBorderColor: "rgba(28, 200, 138, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                data: varcostCounts, // Data varcost
            }]
        },
        options: {
            maintainAspectRatio: false,
            layout: {
                padding: {
                    left: 10,
                    right: 25,
                    top: 25,
                    bottom: 0
                }
            },
            scales: {
                xAxes: [{
                    time: {
                        unit: 'month'
                    },
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    ticks: {
                        maxTicksLimit: 12 // Membatasi agar tampil 12 bulan
                        
                    }
                }],
                yAxes: [{
                    ticks: {
                        maxTicksLimit: 5,
                        padding: 10
                    },
                    gridLines: {
                        color: "rgb(234, 236, 244)",
                        zeroLineColor: "rgb(234, 236, 244)",
                        drawBorder: false,
                        borderDash: [2],
                        zeroLineBorderDash: [2]
                    }
                }]
            },
            legend: {
                display: false
            },
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                titleMarginBottom: 10,
                titleFontColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10
            }
        }
    });
</script>
@endsection