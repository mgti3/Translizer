<?= $this->extend('layouts/User_main') ?>

<?= $this->section('userContent') ?>

<div class="upper-section">
    <h1 class="welcome-header">Welcome To <span class="highlight">Translizer!</span></h1>
    <img src="../public/assets/img/logo-alternative.png" alt="" class="large-logo">
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
    </div>
    <div class="card-body">
        <h3>Name: <span id="username"></span></h3>
        <ul class="statistics-background">
            <li class="statistics-item">
                <h2  id="total" class="stat-number">0</h2>
                <p class="stat-headers">Orders</p>
            </li>
            <li class="statistics-item">
                <h2 id="inProcess" class="stat-number">0</h2>
                <p class="stat-headers">In process</p>
            </li>
            <li class="statistics-item">
                <h2 id="finished" class="stat-number">0</h2>
                <p class="stat-headers">Finished</p>
            </li>
        </ul>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
    </div>
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <div class="container text-left">
                <form id="orderSubmit" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="documentLanguage" class="ml-0">Document Language:</label>
                        <select id="documentLanguage" name="documentLanguage" class="form-control form-control-solid">
                            <option value="English">Arabic</option>
                            <option value="English">English</option>
                            <option value="Spanish">Spanish</option>
                            <option value="French">French</option>
                        </select>
                    </div>

                    <label for="targetLanguage" class="ml-0">Target Language:</label>
                    <select id="targetLanguage" name="targetLanguage" class="form-control form-control-solid">
                        <option value="Spanish">Spanish</option>
                        <option value="English">English</option>
                        <option value="English">Arabic</option>
                        <option value="French">French</option>
                        <option value="German">German</option>
                    </select>

                    <label for="file" class="ml-0">Upload Document:</label>
                    <input type="file" class="form-control bg-light border-0 small" placeholder="Search for..."
                        aria-label="Search" aria-describedby="basic-addon2" name="thefile" required id="thefile">

                    <div class="custom-control custom-checkbox small my-3">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="urgent">
                        <label class="custom-control-label" for="customCheck">Urgent
                        </label>
                    </div>
                    <!-- <a href="#" class="btn btn-primary btn-icon-split"
                        style="margin-top: 15px; background-color: #153448 ">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Submit Order</span>
                    </a> -->
                    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-check"></i> Submit Order </button>
                </form>

            </div>


        </div>

    </div>
</div>

<!-- <div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Place and order</h6>
    </a>
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            This is a collapsable card example using Bootstrap's built in collapse
            functionality. <strong>Click on the card header</strong> to see the card body
            collapse and expand!
        </div>
    </div>
</div> -->





<?= $this->endSection() ?>