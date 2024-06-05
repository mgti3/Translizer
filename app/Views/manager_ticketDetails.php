<?= $this->extend('layouts/manager_main') ?>

<?= $this->section('content') ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><a href="/Translizer/public/manager_tickets" class="alink">Task List</a> &#20;
        &#20; > &#20; &#20; Report <?= $ticket_id ?>
    </h1>
</div>

<div class="container-fluid mt-5">
    <div class="card">
        <div class="card-header">
            <h2>Details</h2>
        </div>
        <div class="card-body">
            <h4>Title: <?= $report[0]['Title'] ?></h4>
            <p>Description: <?= $report[0]['Content'] ?></p>
            <p>Rpeort Upload Date: <?= $report[0]['rep_date'] ?></p>
            <p>Document upload Date: <?= $document[0]['upload_date'] ?></p>
            <p>Language: <?= $document[0]['language'] ?></p>
            <p>Target Language: <?= $document[0]['target_language'] ?></p>
            <!-- Download Document Section -->
            <div class="row mt-5">
                <div class="col-lg-6">
                    <h4>Document:</h4>
                    <iframe src="http://localhost/Translizer/public/assets/Docs/<?= $document[0]['Translation_path'] ?>"
                        width="100%" height="800px"></iframe>
                </div>
                <div class="col-lg-6">
                    <h4>Translation:</h4>
                    <iframe src="http://localhost/Translizer/public/assets/Docs/<?= $document[0]['file_path'] ?>"
                        width="100%" height="800px"></iframe>
                </div>
            </div>

        </div>
    </div>
</div>


<?= $this->endSection() ?>