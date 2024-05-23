<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Team Management</h1>
</div>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Teams</h1>
        <!-- <button class="btn btn-success" data-toggle="modal" data-target="#addTeamModal">
            <i class="fas fa-plus"></i> Add New Team
        </button> -->
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal"
            data-target="#addTeamModal"><i class="fas fa-plus fa-sm text-white-50"></i> Add New Team</a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample1" class="d-block card-header py-3 collapsed border-left-primary"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample1">
                    <h6 class="m-0 font-weight-bold text-primary">Mathematics Team</h6>
                    <div class="small text-secondary">Manager: John Doe</div>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample1">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Incomplete Tasks</th>
                                    <th>Completed Tasks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Adham Alterawi</td>
                                    <td>2</td>
                                    <td>10</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ibrahim Ineizeh</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample2" class="d-block card-header py-3 collapsed border-left-success"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample2">
                    <h6 class="m-0 font-weight-bold text-success">Science Team</h6>
                    <div class="small text-secondary">Manager: Jane Smith</div>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample2">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Incomplete Tasks</th>
                                    <th>Completed Tasks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Mahmoud Aledwan</td>
                                    <td>6</td>
                                    <td>15</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ahmad Ali</td>
                                    <td>0</td>
                                    <td>5</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample3" class="d-block card-header py-3 collapsed border-left-warning"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample3">
                    <h6 class="m-0 font-weight-bold text-warning">Engineering Team</h6>
                    <div class="small text-secondary">Manager: Alice Johnson</div>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample3">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Incomplete Tasks</th>
                                    <th>Completed Tasks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Sara Khan</td>
                                    <td>3</td>
                                    <td>12</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Ali Akbar</td>
                                    <td>1</td>
                                    <td>9</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample4" class="d-block card-header py-3 collapsed border-left-danger"
                    data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample4">
                    <h6 class="m-0 font-weight-bold text-danger">Marketing Team</h6>
                    <div class="small text-secondary">Manager: Michael Brown</div>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Incomplete Tasks</th>
                                    <th>Completed Tasks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Lisa Ray</td>
                                    <td>2</td>
                                    <td>14</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>John Doe</td>
                                    <td>3</td>
                                    <td>8</td>
                                </tr>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Team Modal -->
<div class="modal fade" id="addTeamModal" tabindex="-1" role="dialog" aria-labelledby="addTeamModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTeamModalLabel">Add New Team</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="teamName">Team Name</label>
                        <input type="text" class="form-control" id="teamName" placeholder="Enter team name">
                    </div>
                    <div class="form-group">
                        <label for="managerName">Manager Name</label>
                        <select class="form-control" id="managerName">
                            <?php foreach ($usersWithRoleOne as $user): ?>
                            <option value="<?= $user['User_id'] ?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save Team</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>