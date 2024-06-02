<?= $this->extend('layouts/manager_main') ?>

<?= $this->section('content') ?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tickets</h1>
</div>

<div class="container-fluid fixed-container">
    <div class="row justify-content-start">


        <?php foreach ($reports as $report): ?>
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="card shadow mb-4">

                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0">Ticket #<?= $report['Report_id']?></h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Submitted by: <?= $report['username']?></h6>

                        <p class="card-text my-1">
                            <strong>Document Language:</strong><br>
                            <?= $report['language']?>
                        </p>
                        <p class="card-text my-1">
                            <strong>Target Language:</strong><br>
                            <?= $report['target_language']?>
                        </p>
                        <p class="card-text my-1">
                            <strong>Document Length (Words):</strong><br>
                            <?= $report['wordlen']/0.08?></h6>
                        </p>
                        <p class="card-text my-1">
                            <strong>Is the Document Urgent? </strong><br>
                            <td><?= $report['urgent'] == 1 ? 'Yes' : 'No' ?></td>
                        </p>
                        <a href="#" class="btn view">View Document</a>
                        <a href="#" class="btn mark">Mark as Resolved</a>
                    </div>
                    <div class="card-footer text-muted">
                        Submitted on: <?= $report['rep_date']?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>


<?= $this->endSection() ?>