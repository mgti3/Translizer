<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
</div>

<div class="container mt-5">
    <div class="form-section">
        <h2>Register New Employee</h2>
        <form class="user" method="POST" action="<?= base_url('Admin/addEmployee') ?>">
            <input type="hidden" name="operation" id="operation" value="add"> <!-- حقل مخفي لتحديد نوع العملية -->
            <input type="hidden" name="user_id" id="user_id"> <!-- حقل مخفي لتخزين معرف المستخدم -->
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="username" class="form-control" id="name" placeholder="Enter name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department">Department</label>
                    <select name="dep" class="form-control" id="department" required>
                        <option value="" disabled selected>Select department</option>
                        <?php foreach ($departments as $dep): ?>
                        <option value="<?= $dep['Tid'] ?>"><?= $dep['Team_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="position">Position</label>
                    <select name="Role" class="form-control" id="position" required>
                        <option value="" disabled selected>Select position</option>
                        <option value="0">Admin</option>
                        <option value="4">Manager</option>
                        <option value="1">Employee</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password"
                        placeholder="Enter password" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="conPassword">Confirm Password</label>
                    <input type="password" name="conPassword" class="form-control" id="conPassword"
                        placeholder="Enter password" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mb-4">Submit</button>
        </form>
    </div>
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
                            <th>Actions</th>
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
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($managers as $manager): ?>
                        <tr>
                            <td><?= $manager['manager_id'] ?></td>
                            <td><?= $manager['username'] ?></td>
                            <td><?= $manager['email'] ?></td>
                            <td>Manager</td>
                            <td><?= $manager['Team_id'] ?></td>
                            <td><?= $manager['username'] ?></td>
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="#" class="dropdown-item edit-btn"
                                            data-id="<?= $manager['manager_id'] ?>"
                                            data-name="<?= $manager['username'] ?>"
                                            data-email="<?= $manager['email'] ?>" data-position="1"
                                            data-team="<?= $manager['Team_id'] ?>"
                                            data-manager="<?= $manager['username'] ?>">/ <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <a href="#" class="dropdown-item delete-btn"
                                            data-id="<?= $manager['manager_id'] ?>">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php foreach ($employees as $employee): ?>
                        <td><?= $employee['User_id'] ?></td>
                        <td><?= $employee['username'] ?></td>
                        <td><?= $employee['email'] ?></td>
                        <td><?= ($employee['Role'] == 0) ? 'Admin' : (($employee['Role'] == 1) ? 'Employee' : 'User') ?>
                        </td>
                        <td><?= $employee['Team_id'] ?></td>
                        <td><?= $employee['username'] ?></td> <!-- Added manager's name here -->
                        <td>
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="#" class="dropdown-item edit-btn" data-id="<?= $employee['User_id'] ?>"
                                        data-name="<?= $employee['username'] ?>" data-email="<?= $employee['email'] ?>"
                                        data-position="<?= $employee['Role'] ?>" data-team="<?= $employee['Team_id'] ?>"
                                        data-manager="<?= $employee['username'] ?>">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="<?= base_url('Admin/deleteUser/'.$employee['User_id']) ?>"
                                        class="dropdown-item delete-btn"
                                        onclick="return confirm('Are you sure you want to delete this user?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Confirmation Modal -->
<!-- <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" role="dialog"
    aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="deleteMessage">Are you sure to delete this user from the database?</p>
                <p>Note: When you click on the "Confirm" button, its data will be lost forever.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Confirm</button>
            </div>
        </div>
    </div>
</div> -->

<?= $this->endSection() ?>