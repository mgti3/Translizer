

$(document).ready(function () {

    $.ajax({
        url: '/Translizer/public/userDashboard_load',
        type: 'POST',
        data: 0,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            let total;
            let inProcess;
            let finished;
            let username;
            let logo_name;

            if (document.getElementById('total')) {
                total = document.getElementById('total')
                total.innerText = response['data']['total'];
            }

            if (document.getElementById('inProcess')) {
                inProcess = document.getElementById('inProcess')
                inProcess.innerText = response['data']['inProcess'];
            }

            if (document.getElementById('finished')) {
                finished = document.getElementById('finished')
                finished.innerText = response['data']['completed'];
            }

            if (document.getElementById('username')) {
                username = document.getElementById('username')
                username.innerText = response['name'];
            }

            if (document.getElementById('nametopright')) {
                logo_name = document.getElementById('nametopright')
                logo_name.innerText = response['name'];
            }

        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });

    $('#orderSubmit').submit(function (event) {
        event.preventDefault();

        document.getElementById("errors").innerHTML = "";

        // Front-end validation
        let hasError = false;
        let errorMessage = "";

        // Example of required field validation
        let fileInput = document.getElementById('thefile');
        if (!fileInput || !fileInput.value) {
            hasError = true;
            errorMessage += "File is required.<br>";
        } else {
            // Check file size (limit to 2MB for example)
            let maxSize = 2 * 1024 * 1024 * 1024; // 2MB in bytes
            if (fileInput.files[0].size > maxSize) {
                hasError = true;
                errorMessage += "File size must be less than 2MB.<br>";
            }

            // Check file type (e.g., only allow images)
            let allowedTypes = ['text/plain', 'application/pdf'];
            if (!allowedTypes.includes(fileInput.files[0].type)) {
                hasError = true;
                errorMessage += "File type must be PDF, or TXT.<br>";
            }
        }

        // Example of custom check validation
        let customCheck = document.getElementById('customCheck');
        if (!customCheck.checked) {
            hasError = true;
            errorMessage += "You must agree to the terms.<br>";
        }

        // If there are validation errors, display them and stop the submission
        if (hasError) {
            document.getElementById("errors").innerHTML = errorMessage;
            return;
        }
        let formData = new FormData(this);
        $.ajax({
            url: '/Translizer/public/submit',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    let total;
                    let inProcess;
                    let finished;
                    let username;
                    let logo_name;

                    if (document.getElementById('total')) {
                        total = document.getElementById('total')
                        total.innerText = response['data']['total'];
                    }

                    if (document.getElementById('inProcess')) {
                        inProcess = document.getElementById('inProcess')
                        inProcess.innerText = response['data']['inProcess'];
                    }

                    if (document.getElementById('finished')) {
                        finished = document.getElementById('finished')
                        finished.innerText = response['data']['completed'];
                    }

                    if (document.getElementById('username')) {
                        username = document.getElementById('username')
                        username.innerText = response['name'];
                    }

                    if (document.getElementById('nametopright')) {
                        logo_name = document.getElementById('nametopright')
                        logo_name.innerText = response['name'];
                    }

                    document.getElementById("errors").innerHTML = "";

                    let ur = document.getElementById('customCheck');
                    let file = document.getElementById('thefile');
                    ur.checked = false;
                    file.value = '';


                    $('#exampleModal').modal('show');
                } else if (response.status === 'error') {
                    document.getElementById("errors").innerHTML = (response.validate);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);
            }
        });

    });

    $('#report').submit(function (event) {
        event.preventDefault();

        document.getElementById("errors").innerHTML = "";

        // Front-end validation
        let hasError = false;
        let errorMessage = "";

        // Title validation (at least 3 characters)
        let titleInput = document.getElementById('title');
        if (!titleInput || titleInput.value.length < 3) {
            hasError = true;
            errorMessage += "Title must be at least 3 characters long.<br>";
        }

        // Description validation (at least 10 characters)
        let descriptionInput = document.getElementById('description');
        if (!descriptionInput || descriptionInput.value.length < 10) {
            hasError = true;
            errorMessage += "Description must be at least 10 characters long.<br>";
        }

        // If there are validation errors, display them and stop the submission
        if (hasError) {
            document.getElementById("errors").innerHTML = errorMessage;
            return;
        }
        
        let formData = new FormData(this);
        $.ajax({
            url: '/Translizer/public/reportSubmit',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    document.getElementById("errors").innerHTML = "";

                    let title = document.getElementById('title');
                    let desc = document.getElementById('description');
                    let fileId = document.getElementById('file_id');
                    title.value = '';
                    desc.value = '';
                    fileId.value = '';

                    $('#exampleModal').modal('show');
                } else if (response.status === 'error') {
                    document.getElementById("errors").innerHTML = (response.validate);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);
            }
        });


    });
});