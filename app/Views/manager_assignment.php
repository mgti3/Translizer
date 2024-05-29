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
                        <?php foreach ($documents as $document): ?>
                        <li class="list-group-item mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="./assets/img/logo-alternative.png" style="height: auto; width: 150px;"
                                        class="card-img" alt="Static Image">
                                    <hr class="my-2">
                                </div>
                                <div class="col-md-8">
                                    <h5 class="card-title"><?php echo $document['language']; ?> to
                                        <?php echo $document['target_language']; ?></h5>
                                    <p class="card-text">Estimated Time: <?php echo $document['est_time']; ?> hours</p>
                                    <p class="card-text">Cost: <?php echo $document['cost']; ?> USD</p>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
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