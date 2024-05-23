<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
</div>

<div class="container mt-5">
    <div class="form-section">
        <h2>Register New Employee</h2>
        <form class="user" method="POST" action="Admin/addEmployee">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" name="username" class="form-control" id="name" placeholder="Enter name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department">Department</label>
                    <select name="dep" class="form-control" id="department" required>
                        <option value="" disabled selected>Select department</option>
                        <option value="MT">Mathematical Translations</option>
                        <option value="LT">Literature Translation</option>
                        <option value="ST">Scientific Translation</option>
                        <option value="PT">Political Translation</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="position">Position</label>
                    <select name="Role" class="form-control" id="position" required>
                        <option value="" disabled selected>Select position</option>
                        <option value="0">Admin</option>
                        <option value="1">Manager</option>
                        <option value="2">Employee</option>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                </div>
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
    <!-- DataTales Example -->
    <h2>Information Employees</h2>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data of employees</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0"
                                role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Position</th>
                                        <th>Team</th>
                                        <th>Manager</th>
                                        <th>Start date</th>
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
                                        <th>Start date</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Adham Alterawi</td>
                                        <td>adham.terawi2001@gmail.com</td>
                                        <td>Admin</td>
                                        <td>Admin</td>
                                        <td>Admin</td>
                                        <td>1/1/2024</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item edit-btn" data-id="1"
                                                        data-name="Adham Alterawi"
                                                        data-email="adham.terawi2001@gmail.com" data-position="Admin"
                                                        data-team="Admin" data-manager="Admin" data-start="1/1/2024">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="dropdown-item delete-btn" data-id="1">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Ibrahim Ineizeh</td>
                                        <td>ibrahim0ineizeh@gmail.com</td>
                                        <td>Manager</td>
                                        <td>Mathematics</td>
                                        <td>Ibrahim Ineizeh</td>
                                        <td>1/1/2024</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item edit-btn" data-id="2"
                                                        data-name="Ibrahim Ineizeh"
                                                        data-email="ibrahim0ineizeh@gmail.com" data-position="Manager"
                                                        data-team="Mathematics" data-manager="Ibrahim Ineizeh"
                                                        data-start="1/1/2024">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="dropdown-item delete-btn" data-id="2">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Mahmoud Aledwan</td>
                                        <td>my8977907@gmail.com</td>
                                        <td>Employee</td>
                                        <td>Mathematics</td>
                                        <td>Ibrahim Ineizeh</td>
                                        <td>1/1/2024</td>
                                        <td>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a href="#" class="dropdown-item edit-btn" data-id="3"
                                                        data-name="Mahmoud Aledwan" data-email="my8977907@gmail.com"
                                                        data-position="Employee" data-team="Mathematics"
                                                        data-manager="Ibrahim Ineizeh" data-start="1/1/2024">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <a href="#" class="dropdown-item delete-btn" data-id="3">
                                                        <i class="fas fa-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
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
</div>


<?= $this->endSection() ?>