<?= $this->extend('layouts/Orders_main') ?>

<?= $this->section('Orders') ?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" >Report a problem</h6>
    </div>
    <div class="card-body">
        <form>
            <div class="mb-3"><label for="exampleFormControlInput1">Title</label><input class="form-control"
                    id="exampleFormControlInput1" type="text" placeholder="Wrong Translation..."></div>

            <div class="mb-0"><label for="exampleFormControlTextarea1">Description</label><textarea class="form-control"
                    id="exampleFormControlTextarea1" rows="3"></textarea></div>

            <div class="mb-0"><label for="exampleFormControlTextarea1" style="margin-top: 15px">File
                    Id</label><textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <a href="#" class="btn btn-primary btn-icon-split" style="margin-top: 15px; background-color: #153448 ">
                <span class="icon text-white-50">
                    <i class="fas fa-check"></i>
                </span>
                <span class="text">Submit Report</span>
            </a>
        </form>


    </div>
</div>




<?= $this->endSection() ?>