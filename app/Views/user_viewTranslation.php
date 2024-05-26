<?= $this->extend('layouts/User_main') ?>

<?= $this->section('userContent') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="orders_page" class="alink">Orders</a> &#20; &#20; > &#20; &#20; Order #1234 Translation
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