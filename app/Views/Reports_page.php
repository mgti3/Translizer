<?= $this->extend('layouts/User_main') ?>

<?= $this->section('userContent') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Report a problem</h6>
    </div>
    <div class="card-body">
        <div class="text-danger" id="errors"></div>
        <div class="text-success" id="success-message" style="font-size= 1.2rem;"></div>
        <form id="report">
            <div class="mb-3"><label for="exampleFormControlInput1" class="ml-0">Title</label><input
                    class="form-control" id="title" name="title" type="text" placeholder="Wrong Translation...">
            </div>

            <div class="mb-0"><label for="exampleFormControlTextarea1" class="ml-0">Description</label><textarea
                    class="form-control" id="description" name="description" rows="3"></textarea></div>

            <div class="mb-0">
                <label for="documentLanguage" class="ml-0">File id</label>
                <select id="file_id" name="file_id" class="form-control form-control-solid">
                    <?php foreach ($orders as $order): ?>
                        <option value="<?= $order['Document_id'] ?>"><?= $order['Document_id'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- <a href="#" class="btn btn-primary btn-icon-split" style="margin-top: 15px; background-color: #153448 ">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Submit Report</span>
            </a> -->
            <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mt-3 ml-1"><i
                    class="fas fa-check"></i>
                Submit Report</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Report Submitted and in review</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            your report will be reviewed by the team manager, and solved shortly.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
        </form>


    </div>
</div>




<?= $this->endSection() ?>