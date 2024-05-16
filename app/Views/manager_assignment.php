<?= $this->extend('layouts/manager_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Task Assignment</h1>
</div>

<div class="container-fliud mt-5">

    <div class="row">
        <!-- Task List -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-8">
            <div class="card">
                <div class="card-header">
                    Task List
                </div>
                <div class="card-body">
                    <ul class="list-group" id="taskList">
                        <!-- Tasks will be added here dynamically -->
                    </ul>
                </div>
            </div>
        </div>

        <!-- Task Assignment Form -->
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card ">
                <div class="card-header">
                    Assign a New Task
                </div>
                <div class="card-body">
                    <form id="taskForm">
                        <div class="form-group">
                            <label for="taskName">Task Name</label>
                            <input type="text" class="form-control" id="taskName" required>
                        </div>
                        <div class="form-group">
                            <label for="assignedTo">Assign To</label>
                            <input type="text" class="form-control" id="assignedTo" required>
                        </div>
                        <div class="form-group">
                            <label for="dueDate">Due Date</label>
                            <input type="date" class="form-control" id="dueDate" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Assign Task</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection() ?>