<div class="container-fluid">

    <div class="alert alert-success mt-4" role="alert">
        <h5><i class="fas fa-fw fa-chart-area"></i> Laporan Keuangan</h5>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-8">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Pemasukkan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $totalm ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-12 col-md-12 mb-8 mt-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Total Pengeluaran</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= $totalk ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="alert alert-success mt-4" role="alert">
        <h5><i class="fas fa-fw fa-chart-area"></i> Kelola Keuangan</h5>
    </div>

    <div class="row">

    <div class="col-xl-6 col-md-12 mb-8">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="<?= base_url('admin/keuangan/uangmasuk') ?>" class="btn btn-primary"> Pemasukkan Keuangan</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-6 col-md-12 mb-8">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="<?= base_url('admin/keuangan/uangkeluar') ?>" class="btn btn-danger"> Pengeluaran Keuangan</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-times fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
</a>