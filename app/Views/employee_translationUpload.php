<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>
<script>
    function getTodayDate() {
        const today = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = today.toLocaleDateString(undefined, options);
        document.getElementById('date').innerHTML = "<strong>Upload Date:</strong> "+formattedDate;
    }
    document.addEventListener('DOMContentLoaded', getTodayDate);

</script>
<div id="toastContainer" class="toast-container">
    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header">
            <strong class="mr-auto">Notification</strong>
            <small>Just now</small>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">

        </div>
    </div>
</div>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="employee_dashboard" class="alink">Task List</a> >
        Upload Translation</h1>
</div>

<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Upload</h2>
        </div>
        <div class="card-body">
            <?php $session = \Config\Services::session();
                $username= $session->get('username');?>
            <!-- Upload Document Section -->
            <div>
                <h4>Upload Translation</h4>
                <div id="errors"></div>
                <form class="user" id="translationSub">
                    <div class="mb-3">
                        <label for="documentUpload" class="form-label">Choose document to upload</label>
                        <input class="form-control" type="file" id="documentUpload" name="thefile">
                    </div>
                    <div class="mb-4">
                        <h4>Translation Details</h4>
                        <p><strong>Uploaded By:</strong> <?=$username?></p>
                        <p id='date'> </p>
                    </div>
                    <button type="submit" class="btn mark">Upload Document</button>
                </form>
            </div>

            <!-- Document Details Section -->





        </div>
    </div>
</div>


<?= $this->endSection() ?>