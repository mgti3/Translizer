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
        <?php foreach ($teams as $team): ?>
        <div class="col-md-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardExample<?= $team['Tid'] ?>"
                    class="d-block card-header py-3 collapsed border-left-primary" data-toggle="collapse" role="button"
                    aria-expanded="false" aria-controls="collapseCardExample<?= $team['Tid'] ?>">
                    <h6 class="m-0 font-weight-bold text-primary"><?= $team['Team_name'] ?></h6>
                    <div class="small text-secondary">Manager: John Doe</div>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse" id="collapseCardExample<?= $team['Tid'] ?>">
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
        <?php endforeach; ?>
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
                <form action="Admin/addTeam" method="post">
                    <div class="form-group">
                        <label for="teamName">Team Name</label>
                        <input type="text" name="teamName" class="form-control" id="teamName"
                            placeholder="Enter team name">
                    </div>
                    <div class="form-group">
                        <label for="managerName">Manager Name</label>
                        <select class="form-control" id="managerName">
                            <option value="" disabled selected>Select Manager</option>
                            <?php foreach ($usersWithRoleOne as $user): ?>
                            <option value="<?= $user['User_id'] ?>"><?= $user['username'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="saveTeam btn-primary">Save Team</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>