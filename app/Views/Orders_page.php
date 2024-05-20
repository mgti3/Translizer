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
                            <th>State</th>
                            <th>Translation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>Order date</th>
                            <th>Cost</th>
                            <th>State</th>
                            <th>Translation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>2024/05/01</td>
                            <td>$450.75</td>
                            <td>Done</td>
                            <td><a href="">Translation-1</a></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>2024/05/02</td>
                            <td>$320.40</td>
                            <td>In Process</td>
                            <td><a href="">Translation-2</a></td>
                        </tr>
                        <tr>
                            <td>99</td>
                            <td>2024/05/30</td>
                            <td>$890.60</td>
                            <td>Done</td>
                            <td><a href="">Translation-99</a></td>
                        </tr>
                        <tr>
                            <td>100</td>
                            <td>2024/05/31</td>
                            <td>$550.20</td>
                            <td>In Process</td>
                            <td><a href="">Translation-100</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <?= $this->endSection() ?>