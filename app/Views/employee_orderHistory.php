<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>



<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order History</h1>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Employee Progress</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Language</th>
                        <th>Target Language</th>
                        <th>Urgent?</th>
                        <th>Estimated Time</th>
                        <th>State</th>
                        <th>Upload Date</th>
                        
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Order Id</th>
                        <th>Language</th>
                        <th>Target Language</th>
                        <th>Urgent?</th>
                        <th>Estimated Time</th>
                        <th>State</th>
                        <th>Upload Date</th>
                      
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['Document_id'] ?></td>
                            <td><?= $order['language'] ?></td>
                            <td><?= $order['target_language'] ?></td>
                            <td><?= $order['urgent'] == 1 ? 'Yes' : 'No' ?></td>
                            <td><?= $order['est_time'] ?></td>
                            <td><?= $order['state'] ?></td>
                            <td><?= $order['upload_date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <?= $this->endSection() ?>