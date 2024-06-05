<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Team Management</h1>
</div>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Teams</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#addTeamModal"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Team</a>
    </div>

    <div class="row">
        <?php foreach ($teams as $team): ?>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample<?= $team['Tid'] ?>"
                    class="d-block card-header py-3 collapsed border-left-primary" data-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="collapseCardExample<?= $team['Tid'] ?>">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $team['Team_name'] ?></h6>
                    <div class="small text-primary">Manager: <?= $managers[$team['Tid']] ?></div>
                </a>
                <div class="collapse" id="collapseCardExample<?= $team['Tid'] ?>">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <!-- Add more table headings as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (isset($employees[$team['Tid']])): ?>
                                    <?php foreach ($employees[$team['Tid']] as $employee): ?>
                                        <tr>
                                            <td><?= $employee['User_id'] ?></td>
                                            <td><?= $employee['username'] ?></td>
                                            <!-- Add more table data columns as needed -->
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<?= $this->endSection() ?>