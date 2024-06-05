
<?= $this->extend('layouts/employee_main') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="/Translizer/public/employee_dashboard" class="alink">Task List</a> &#20; &#20; > &#20; &#20; Order <?=$Document_id?></h1>
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
                    <a href="http://localhost/Translizer/public/assets/Docs/<?=$file_path?>" class="btn btn-primary" download>Download Document</a>
                    
                </div>

                <!-- Document Details Section -->
                <div class="mb-4">
                    <h4>Document Details</h4>
                    <p><strong>Document Name:</strong> <?=$file_path?></p>
                    <p><strong>Uploaded By:</strong> <?=$username?></p></p>
                    <p><strong>Upload Date:</strong> <?=$upload_date?></p></p>
                    <p><strong>Description:</strong> This is an example document for demonstration purposes.</p>
                </div>

                <div class="mb-4">
                <iframe src="http://localhost/Translizer/public/assets/Docs/<?=$file_path?>" width="100%" height="800px"></iframe>
                </div>

            </div>
        </div>
    </div>


<?= $this->endSection() ?>