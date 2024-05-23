
<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="employee_dashboard" class="alink">Task List</a> &#20; &#20; > &#20; &#20; Order #1234</h1>
</div>

<div class="container-fluid mt-5">
        <div class="card">
            <div class="card-header">
                <h2>Document Management</h2>
            </div>
            <div class="card-body">
                <!-- Download Document Section -->
                <div class="mb-4">
                    <h4>Download Document</h4>
                    <p>Click the button below to download the document.</p>
                    <a href="path-to-your-document.pdf" class="btn btn-primary" download>Download Document</a>
                    <a href="employee_viewDoc" class="btn btn-primary">View Document</a>
                </div>

                <!-- Document Details Section -->
                <div class="mb-4">
                    <h4>Document Details</h4>
                    <p><strong>Document Name:</strong> Example Document</p>
                    <p><strong>Uploaded By:</strong> John Doe</p>
                    <p><strong>Upload Date:</strong> May 19, 2024</p>
                    <p><strong>Description:</strong> This is an example document for demonstration purposes.</p>
                </div>

                <!-- Upload Document Section -->
                <div>
                    <h4>Upload New Document</h4>
                    <form action="your-upload-url" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="documentUpload" class="form-label">Choose document to upload</label>
                            <input class="form-control" type="file" id="documentUpload" name="document">
                        </div>
                        <button type="submit" class="btn mark">Upload Document</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?= $this->endSection() ?>