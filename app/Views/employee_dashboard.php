<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>


<!-- Content Row -->
<div class="row">



    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Orders</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">9</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-file fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Completed Tasks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-tasks fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Progress
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">60%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 60%"
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
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Rating</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">3.5</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-star fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Task List</h1>
</div>

<div class="container-fluid fixed-container mt-2">
    <div class="row justify-content-start">

        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Order #12345</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Placed on: May 19, 2024</h6>

                    <p class="card-text">
                        <strong>Document Length:</strong><br>
                        3567 Words
                    </p>
                    <a href="employee_orderDetails" class="btn view my-1">View Order Details</a>
                    <a href="employee_translationUpload" class="btn mark my-1">Upload Translation</a>
                </div>
                <div class="card-footer text-muted">
                    Order Status: Delivered
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Order #12345</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Placed on: May 19, 2024</h6>

                    <p class="card-text">
                        <strong>Document Length:</strong><br>
                        3567 Words
                    </p>
                    <a href="employee_orderDetails" class="btn view my-1">View Order Details</a>
                    <a href="#" class="btn mark my-1">Upload Translation</a>
                </div>
                <div class="card-footer text-muted">
                    Order Status: Delivered
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Order #12345</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Placed on: May 19, 2024</h6>

                    <p class="card-text">
                        <strong>Document Length:</strong><br>
                        3567 Words
                    </p>
                    <a href="employee_orderDetails" class="btn view my-1">View Order Details</a>
                    <a href="#" class="btn mark my-1">Upload Translation</a>
                </div>
                <div class="card-footer text-muted">
                    Order Status: Delivered
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Order #12345</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Placed on: May 19, 2024</h6>

                    <p class="card-text">
                        <strong>Document Length:</strong><br>
                        3567 Words
                    </p>
                    <a href="employee_orderDetails" class="btn view my-1">View Order Details</a>
                    <a href="#" class="btn mark my-1">Upload Translation</a>
                </div>
                <div class="card-footer text-muted">
                    Order Status: Done
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
            <div class="card shadow mb-4">
                <div class="card-header bg-light">
                    <h5 class="card-title mb-0">Order #12345</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Placed on: May 19, 2024</h6>

                    <p class="card-text">
                        <strong>Document Length:</strong><br>
                        3567 Words
                    </p>
                    <a href="employee_orderDetails" class="btn view my-1">View Order Details</a>
                    <a href="#" class="btn mark my-1">Upload Translation</a>
                </div>
                <div class="card-footer text-muted">
                    Order Status: Pending
                </div>
            </div>
        </div>


    </div>
</div>

<!-- Content Row -->

<div>



</div>

<?= $this->endSection() ?>