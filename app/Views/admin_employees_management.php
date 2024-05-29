<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
</div>

<div class="container mt-5">
    <div class="form-section">
        <!-- حقل خفي لتحديد العملية -->
        <input type="hidden" name="operation" id="operation" value="add">
        <h2>Register New Employee</h2>
        <form class="user" method="POST" action="Admin/addEditEmployee">
            <?php if (isset($editMode) && $editMode === true): ?>
            <input type="hidden" name="user_id" value="<?= $employeeData['User_id'] ?>">
            <?php endif; ?>
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
                        <option value="<?= $dep['Tid'] ?>"
                            <?= isset($editMode) && $employeeData['Team_id'] == $dep['Tid'] ? 'selected' : '' ?>>
                            <?= $dep['Team_name'] ?></option>
                        <?php endforeach; ?>
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
                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                    <!-- Table Header -->
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
                    <!-- Table Body -->
                    <tbody>
                        <!-- Loop through each employee -->
                        <?php foreach ($employees as $employee): ?>
                        <tr>
                            <!-- Display employee information -->
                            <td><?= $employee['User_id'] ?></td>
                            <td><?= $employee['username'] ?></td>
                            <td><?= $employee['email'] ?></td>
                            <td><?= ($employee['Role'] == 0) ? 'Admin' : (($employee['Role'] == 1) ? 'Employee' : 'Manager') ?>
                            </td>
                            <td><?= $employee['Team_id'] ?></td>
                            <td><?= $employee['manager_name'] ?></td>
                            <!-- Actions column with edit and delete buttons -->
                            <td>
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <!-- Edit button -->
                                        <a href="#" class="dropdown-item edit-btn"
                                            data-id="<?= $employee['User_id'] ?>"
                                            data-name="<?= $employee['username'] ?>"
                                            data-email="<?= $employee['email'] ?>"
                                            data-position="<?= ($employee['Role'] == 0) ? 'Admin' : (($employee['Role'] == 1) ? 'Employee' : 'Manager') ?>"
                                            data-team="<?= $employee['Team_id'] ?>"
                                            data-manager="<?= ($employee['Role'] == 1) ? 'Admin' : (($employee['Role'] == 1) ? 'Employee' : 'Manager') ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Delete button -->
                                        <a href="#" class="dropdown-item delete-btn"
                                            data-id="<?= $employee['User_id'] ?>"
                                            data-name="<?= $employee['username'] ?>">
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





<?= $this->endSection() ?>