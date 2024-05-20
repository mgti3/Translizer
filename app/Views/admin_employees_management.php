<?= $this->extend('layouts/admin_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Employee Management</h1>
</div>

<div class="container mt-5">
    <div class="form-section">
        <h2>Register New Employee</h2>
        <form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="department">Department</label>
                    <select class="form-control" id="department" required>
                        <option value="" disabled selected>Select department</option>
                        <option value="HR">HR</option>
                        <option value="IT">IT</option>
                        <option value="Sales">Sales</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                </div>

                <div class="form-group col-md-6">
                    <label for="position">Position</label>
                    <select class="form-control" id="position" required>
                        <option value="" disabled selected>Select position</option>
                        <option value="Admin">Admin</option>
                        <option value="Manager">Manager</option>
                        <option value="Employee">Employee</option>
                    </select>
                </div>

            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" required>
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
                                        <th>Age</th>
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
                                        <th>Age</th>
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
                                        <td>23</td>
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
                                                        data-email="adham.terawi2001@gmail.com" data-age="23"
                                                        data-position="Admin" data-team="Admin" data-manager="Admin"
                                                        data-start="1/1/2024">
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
                                        <td>23</td>
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
                                                        data-email="ibrahim0ineizeh@gmail.com" data-age="23"
                                                        data-position="Manager" data-team="Mathematics"
                                                        data-manager="Ibrahim Ineizeh" data-start="1/1/2024">
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
                                        <td>23</td>
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
                                                        data-age="23" data-position="Employee" data-team="Mathematics"
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
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing 1
                                to 10 of 57 entries</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="dataTable_previous"><a
                                            href="#" aria-controls="dataTable" data-dt-idx="0" tabindex="0"
                                            class="page-link">Previous</a></li>
                                    <li class="paginate_button page-item active"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                    <li class="paginate_button page-item"><a href="#" aria-controls="dataTable"
                                            data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                    <li class="paginate_button page-item next" id="dataTable_next"><a href="#"
                                            aria-controls="dataTable" data-dt-idx="7" tabindex="0"
                                            class="page-link">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection() ?>