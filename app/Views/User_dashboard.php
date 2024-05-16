<?= $this->extend('layouts/User_main') ?>

<?= $this->section('userContent') ?>

<div class="upper-section">
    <h1 class="welcome-header">Welcome To <span class="highlight">Translizer!</span></h1>
    <img src="../public/assets/img/logo-alternative.png" alt="" class="large-logo">
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
    </div>
    <div class="card-body">
        <h3>Name: user name </h3>
        <ul class="statistics-background">
            <li class="statistics-item">
                <h2 class="stat-number">64</h2>
                <p class="stat-headers">Orders</p>
            </li>
            <li class="statistics-item">
                <h2 class="stat-number">53</h2>
                <p class="stat-headers">In process</p>
            </li>
            <li class="statistics-item">
                <h2 class="stat-number">11</h2>
                <p class="stat-headers">Finished</p>
            </li>
        </ul>
    </div>
</div>
<div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Place an order</h6>
    </a>
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            <form action="/upload" method="post" enctype="multipart/form-data">
                <label for="documentLanguage">Document Language:</label>
                <select id="documentLanguage" name="documentLanguage" style="width: 80%;">
                    <option value="English">English</option>
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                </select>

                <label for="targetLanguage">Target Language:</label>
                <select id="targetLanguage" name="targetLanguage" style="width: 80%;">
                    <option value="Spanish">Spanish</option>
                    <option value="French">French</option>
                    <option value="German">German</option>
                </select>

                <label for="file">Upload Document:</label>
                <input type="file" id="file" name="file" accept=".docx,.pdf,.txt,.doc,.xls,.xlsx,.ppt,.pptx" style="width: 80%;">

                <label for="urgency">Urgent Translation:</label>
                <input type="checkbox" id="urgency" name="urgency">

                <input type="submit" value="Submit Order">
            </form>
        </div>
    </div>
</div>

<!-- <div class="card shadow mb-4">
    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
        aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Place and order</h6>
    </a>
    <div class="collapse show" id="collapseCardExample">
        <div class="card-body">
            This is a collapsable card example using Bootstrap's built in collapse
            functionality. <strong>Click on the card header</strong> to see the card body
            collapse and expand!
        </div>
    </div>
</div> -->





<?= $this->endSection() ?>