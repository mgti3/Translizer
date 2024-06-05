<?= $this->extend('layouts/manager_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Task Assignment</h1>
</div>

<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <form id="taskForm" action="<?= base_url('Manager/taskAssignment') ?>" method="POST" onsubmit="return validateForm()" class="form-inline">
                <div class="form-group mr-2">
                    <label for="taskName" class="mr-2">Task Name</label>
                    <input type="text" class="form-control" id="taskName" name="taskName" onkeyup="filterTasks()" required>
                </div>
                <div class="form-group mr-2">
                    <label for="assignedTo" class="mr-2">Assign To</label>
                    <select class="form-control" id="assignedTo" name="assignedTo" required>
                        <option value="" disabled selected>Select Employee</option>
                        <?php foreach ($employees as $employee): ?>
                            <option value="<?= $employee['User_id'] ?>"><?= $employee['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary ml-4">Assign Task</button>
            </form>
        </div>
        <div class="card-body">
            <p>Select the doc:</p>
            <ul class="list-group" id="taskList">
                <?php foreach ($documents as $document): ?>
                <li class="list-group-item mb-3 shadow-sm" style="border-radius: 10px;" data-doc-id="<?= $document['Document_id'] ?>" onclick="selectTask(this)">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="./assets/img/logo-alternative.png" style="height: auto; width: 150px;" class="card-img" alt="Static Image">
                            <hr class="my-2">
                        </div>
                        <div class="col-md-8">
                            <h5 class="card-title"><?php echo $document['language']; ?> to <?php echo $document['target_language']; ?></h5>
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

<!-- DataTales Example -->
<div class="container-fluid mt-5">

    <div class="card shadow mt-5 mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Employee Progress</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>documents id</th>
                            <th>employee name</th>
                            <th>language</th>
                            <th>target_language</th>
                            <th>urgent</th>
                            <th>cost</th>
                            <th>est_time</th>
                            <th>state</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>documents id</th>
                            <th>employee name</th>
                            <th>language</th>
                            <th>target_language</th>
                            <th>urgent</th>
                            <th>cost</th>
                            <th>est_time</th>
                            <th>state</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php foreach ($documentsinfo as $document): ?>
                        <tr>
                            <td><?= $document['Document_id'] ?></td>
                            <td><?= $document['employee_name'] ?></td>
                            <td><?= $document['language'] ?></td>
                            <td><?= $document['target_language'] ?></td>
                            <td><?= $document['urgent'] ? 'Yes' : 'No' ?></td>
                            <td>$<?= $document['cost'] ?></td>
                            <td><?= $document['est_time'] ?> hours</td>
                            <td><?= $document['state'] === 'Pending' ? 'uncompleted' : 'completed' ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<script>
function filterTasks() {
    let input = document.getElementById('taskName');
    let filter = input.value.toLowerCase();
    let ul = document.getElementById("taskList");
    let li = ul.getElementsByTagName('li');

    for (let i = 0; i < li.length; i++) {
        let div = li[i].getElementsByClassName("card-title")[0];
        if (div) {
            let txtValue = div.textContent || div.innerText;
            if (txtValue.toLowerCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
}

function selectTask(element) {
    // إزالة التحديد من جميع العناصر
    let items = document.querySelectorAll('#taskList .list-group-item');
    items.forEach(item => {
        item.classList.remove('border-primary');
    });

    // إضافة التحديد للعنصر المحدد
    element.classList.add('border-primary');

    // الحصول على الـ ID للوثيقة
    let docId = element.getAttribute('data-doc-id');
    
    // تعيين الـ ID في حقل الإدخال
    document.getElementById('taskName').value = docId;
}

function validateForm() {
    let taskName = document.getElementById('taskName').value;
    let assignedTo = document.getElementById('assignedTo').value;

    if (!/^\d+$/.test(taskName)) {
        alert("Task Name يجب أن يحتوي على أرقام فقط.");
        return false;
    }

    return true;
}
</script>

<?= $this->endSection() ?>
