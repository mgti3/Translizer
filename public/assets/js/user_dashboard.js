

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

                    const successMessage = document.getElementById('success-message');
                    successMessage.textContent = response.status;
                    successMessage.style.display = 'block';

                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 5000); // Adjust the time as needed
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

                    const successMessage = document.getElementById('success-message');
                    successMessage.textContent = response.status;
                    successMessage.style.display = 'block';

                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 5000); // Adjust the time as needed
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