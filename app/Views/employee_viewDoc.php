<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="employee_dashboard" class="alink">Task List</a> &#20; &#20; > &#20; &#20;
        <a href="employee_orderDetails" class="alink"> Order #1234</a> &#20; &#20; > &#20; &#20; Document
    </h1>
</div>

<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Document</h2>
        </div>
        <div class="card-body">
            <!-- Download Document Section -->
            <iframe src="http://localhost/Translizer/public/assets/Docs/API.pdf" width="100%" height="800px"></iframe>
        </div>
    </div>
</div>


<?= $this->endSection() ?>