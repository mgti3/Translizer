$(document).ready(function () {
    $.ajax({
        url: '/Translizer/public/adminName',
        type: 'POST',
        data: 0,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if (response.status === 'success') {
                document.getElementById("username").innerText = response['name'];
            } else if (response.status === 'error') {

            }
        },
        error: function (xhr, status, error) {
            console.log('An error occurred:', error);
        }
    });
});