<?= $this->extend('layouts/User_main') ?>

<?= $this->section('userContent') ?>

<div class="card shadow mb-4">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Order date</th>
                            <th>Cost</th>
                            <th>Time Estimation</th>
                            <th>State</th>
                            <th>Team Name</th>
                            <th>Translation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Order date</th>
                            <th>Cost</th>
                            <th>Time Estimation</th>
                            <th>State</th>
                            <th>Team Name</th>
                            <th>Translation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?= $order['Document_id'] ?></td>
                                <td><?= $order['upload_date'] ?></td>
                                <td><?= $order['cost'] ?></td>
                                <td><?= $order['est_time'] ?></td>
                                <td><?= $order['state'] ?></td>
                                <td><?= $order['team_name'] ?></td>
                                <td><a href="/Translizer/public/user_viewTranslation/<?=$order['Translation_path']?>/<?=$order['Document_id']?>"><?= $order['Translation_path'] ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <?= $this->endSection() ?>