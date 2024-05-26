<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="employee_dashboard" class="alink">Task List</a> &#20; &#20; > &#20; &#20;
        Upload Translation</h1>
</div>

<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Upload</h2>
        </div>
        <div class="card-body">

            <!-- Upload Document Section -->
            <div>
                <h4>Upload Translation</h4>
                <form action="your-upload-url" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="documentUpload" class="form-label">Choose document to upload</label>
                        <input class="form-control" type="file" id="documentUpload" name="document">
                    </div>
                    <button type="submit" class="btn mark">Upload Document</button>
                </form>
            </div>

            <!-- Document Details Section -->
            <div class="mb-4">
                <h4>Translation Details</h4>
                <p><strong>Document Name:</strong> Example Document</p>
                <p><strong>Uploaded By:</strong> John Doe</p>
                <p><strong>Upload Date:</strong> May 19, 2024</p>
            </div>


            <!-- Download Document Section -->
            <div class="mb-4">
                <h4>View Uploaded Translation</h4>
                <a href="employee_viewTranslation" class="btn btn-primary">View Document</a>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>