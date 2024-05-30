<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>


<!-- Content Row -->
<div class="row">



    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Tasks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$ordersCount?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Pending Requests Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Completed Tasks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$completed?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-tasks fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progress
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$progress?>%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?=$progress?>%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Task List</h1>
</div>

<div class="container-fluid fixed-container mt-2">
    <div class="row justify-content-start">
        <?php foreach ($orders as $order): ?>
            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">#<?=$order['Document_id']?></h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Placed on: <?=$order['upload_date']?></h6>

                    <p class="card-text">
                        <strong>Document Length:</strong><br>
                        3567 Words
                    </p>
                    <a href="/Translizer/public/employee_orderDetails/<?=$order['file_path']?>/<?=$order['Document_id']?>/<?=$order['upload_date']?>" class="btn view my-1">View Order Details</a>
                    <a href="employee_translationUpload" class="btn mark my-1">Upload Translation</a>
                </div>
                <div class="card-footer text-muted">
                    Order Status: <?=$order['state']?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        




    </div>
</div>

<!-- Content Row -->

<div>



</div>

<?= $this->endSection() ?>