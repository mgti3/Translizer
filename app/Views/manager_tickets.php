<?= $this->extend('layouts/manager_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
</div>

<div class="container-fluid fixed-container">
    <div class="row justify-content-start" id="listTickets">

    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center" id="pagination">
            <!-- Pagination controls will be dynamically added here -->
        </ul>
    </nav>
</div>


<?= $this->endSection() ?>