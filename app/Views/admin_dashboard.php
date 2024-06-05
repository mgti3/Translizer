<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
                            Employees Count</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalEmployeesCount ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Earnings (Monthly)</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">$<?= number_format($monthlyEarnings) ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed Tasks</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $completedTasks ?> Tasks
                                </div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: <?= $completedTasksPercentage ?>%"
                                        aria-valuenow="<?= $completedTasksPercentage ?>" aria-valuemin="0"
                                        aria-valuemax="100"></div>
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

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">In Progress Tasks</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $inProgressTasks ?> Tasks</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Content Row -->

<div class="row">


    <!-- Project Card Example -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
            </div>
            <div class="card-body">
                <?php foreach ($teamProgress as $team): ?>
                <h4 class="small font-weight-bold"><?= $team['name'] ?> Team <span
                        class="float-right"><?= round($team['progress'], 2) ?>%</span></h4>
                <div class="progress mb-4">
                    <div class="progress-bar" role="progressbar" style="width: <?= $team['progress'] ?>%"
                        aria-valuenow="<?= $team['progress'] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>



    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Document Distribution</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>

            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <?php foreach ($teamDocumentPercentages as $team): ?>
                    <span class="mr-2">
                        <i class="fas fa-circle text-primary"></i> <?= $team['name'] ?>
                    </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">A table showing important data for all employees.</p>

    <!-- Data Table -->
    <h2>Information Employees</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data of employees</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid"
                    aria-describedby="dataTable_info" style="width: 100%;">
                    <thead>
                        <tr role="row">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Team</th>
                            <th>Manager</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Position</th>
                            <th>Team</th>
                            <th>Manager</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($managers as $manager): ?>
                        <tr>
                            <td><?= $manager['manager_id'] ?></td>
                            <td><?= $manager['username'] ?></td>
                            <td><?= $manager['email'] ?></td>
                            <td>Manager</td>
                            <td>
                                <?php
            // Fetch the team name based on Team_id
            $teamName = '';
            foreach ($departments as $department) {
                if ($department['Tid'] == $manager['Team_id']) {
                    $teamName = $department['Team_name'];
                    break;
                }
            }
            echo $teamName;
        ?>
                            </td>
                            <td><?= $manager['username'] ?></td>
                            <?php endforeach; ?>

                            <?php foreach ($employees as $employee): ?>
                        <tr>
                            <td><?= $employee['User_id'] ?></td>
                            <td><?= $employee['username'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= ($employee['Role'] == 0) ? 'Admin' : (($employee['Role'] == 1) ? 'Employee' : 'User') ?>
                            </td>
                            <td>
                                <?php
        // Check if Team_id or Team_name is null
        if ($employee['Team_id'] === null) {
            echo 'Translizer';
        } else {
            // Fetch the team name based on Team_id
            $teamName = '';
            foreach ($departments as $department) {
                if ($department['Tid'] == $employee['Team_id']) {
                    $teamName = $department['Team_name'];
                    break;
                }
            }
            echo $teamName;
        }
        ?>
                            </td>
                            <td><?= $employee['username'] ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <div class="form-group">
                        <label for="editName">Name</label>
                        <input type="text" class="form-control" id="editName" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="editEmail">Email</label>
                        <input type="email" class="form-control" id="editEmail" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="editAge">Age</label>
                        <input type="number" class="form-control" id="editAge" placeholder="Enter age">
                    </div>
                    <div class="form-group">
                        <label for="editPosition">Position</label>
                        <input type="text" class="form-control" id="editPosition" placeholder="Enter position">
                    </div>
                    <div class="form-group">
                        <label for="editTeam">Team</label>
                        <input type="text" class="form-control" id="editTeam" placeholder="Enter team">
                    </div>
                    <div class="form-group">
                        <label for="editManager">Manager</label>
                        <input type="text" class="form-control" id="editManager" placeholder="Enter manager">
                    </div>
                    <div class="form-group">
                        <label for="editStartDate">Start Date</label>
                        <input type="text" class="form-control" id="editStartDate" placeholder="Enter start date">
                    </div>
                    <div class="form-group">
                        <label for="editSalary">Salary</label>
                        <input type="text" class="form-control" id="editSalary" placeholder="Enter salary">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveChanges">Save changes</button>
            </div>
        </div>
    </div>
</div>

<script>
var pieChartData = <?= json_encode([
        'labels' => array_column($teamDocumentPercentages, 'name'),
        'data' => array_column($teamDocumentPercentages, 'percentage')
    ]) ?>;
</script>


<?= $this->endSection() ?>