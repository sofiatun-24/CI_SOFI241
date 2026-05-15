<div class="container-fluid">

    <style>
        :root{
            --primary:#4e73df;
            --success:#1cc88a;
            --warning:#f6c23e;
            --danger:#e74a3b;
            --dark:#5a5c69;
            --light:#f8f9fc;
        }

        .dashboard-title{
            font-weight:700;
            color:var(--dark);
        }

        .card-dashboard{
            border:none;
            border-radius:20px;
            overflow:hidden;
            transition:.3s;
            box-shadow:0 10px 25px rgba(0,0,0,.06);
        }

        .card-dashboard:hover{
            transform:translateY(-5px);
        }

        .icon-box{
            width:65px;
            height:65px;
            border-radius:18px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:26px;
            color:white;
        }

        .bg-gradient-primary{
            background:linear-gradient(135deg,#4e73df,#6f86ff);
        }

        .bg-gradient-success{
            background:linear-gradient(135deg,#1cc88a,#36d399);
        }

        .bg-gradient-warning{
            background:linear-gradient(135deg,#f6c23e,#ffd166);
        }

        .bg-gradient-danger{
            background:linear-gradient(135deg,#e74a3b,#ff6b6b);
        }

        .chart-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,.06);
        }

        .welcome-box{
            background:linear-gradient(135deg,#4e73df,#6f86ff);
            border-radius:20px;
            padding:30px;
            color:white;
            margin-bottom:30px;
            position:relative;
            overflow:hidden;
        }

        .welcome-box::after{
            content:'';
            position:absolute;
            right:-40px;
            top:-40px;
            width:180px;
            height:180px;
            background:rgba(255,255,255,.08);
            border-radius:50%;
        }

        .welcome-box h2{
            font-weight:700;
        }

        .welcome-box p{
            opacity:.9;
            margin-bottom:0;
        }

        .mini-text{
            font-size:12px;
            text-transform:uppercase;
            letter-spacing:.08em;
            font-weight:600;
            color:#858796;
        }
    </style>

    <!-- WELCOME -->
    <div class="welcome-box">

        <h2 class="mb-2">
            <i class="fas fa-book-reader mr-2"></i>
            Dashboard Perpustakaan
        </h2>

        <p>
            Selamat datang di sistem informasi perpustakaan.
            Pantau statistik data perpustakaan secara realtime.
        </p>

    </div>

    <!-- TITLE -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h3 class="dashboard-title mb-1">
                Statistik Dashboard
            </h3>

            <p class="text-muted mb-0" style="font-size:13px;">
                Ringkasan data perpustakaan
            </p>

        </div>

    </div>

    <!-- CARD STATISTIK -->
    <div class="row">

        <!-- TOTAL KATEGORI -->
        <div class="col-xl-6 col-md-6 mb-4">

            <div class="card card-dashboard h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="mini-text mb-2">
                                Total Kategori
                            </div>

                            <h2 class="font-weight-bold text-dark mb-0">
                                <?= $total_kategori; ?>
                            </h2>

                        </div>

                        <div class="icon-box bg-gradient-primary">

                            <i class="fas fa-tags"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- TOTAL ANGGOTA -->
        <div class="col-xl-6 col-md-6 mb-4">

            <div class="card card-dashboard h-100">

                <div class="card-body">

                    <div class="d-flex align-items-center justify-content-between">

                        <div>

                            <div class="mini-text mb-2">
                                Total Anggota
                            </div>

                            <h2 class="font-weight-bold text-dark mb-0">
                                <?= $total_anggota; ?>
                            </h2>

                        </div>

                        <div class="icon-box bg-gradient-success">

                            <i class="fas fa-users"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- GRAFIK -->
    <div class="row">

        <div class="col-xl-12">

            <div class="card chart-card mb-4">

                <div class="card-header bg-white border-0 py-3">

                    <h5 class="mb-0 font-weight-bold text-primary">

                        <i class="fas fa-chart-bar mr-2"></i>

                        Grafik Data Perpustakaan

                    </h5>

                </div>

                <div class="card-body">

                    <div style="position:relative; height:350px;">

                        <canvas id="chartDashboard"></canvas>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>