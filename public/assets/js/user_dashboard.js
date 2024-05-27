

$(document).ready(function () {

    $('#orderSubmit').submit(function (event) {
        event.preventDefault();
        let form = $(this);
        console.log(form);
        let formData = new FormData(this);
        $.ajax({
            url: '/Translizer/public/submit',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                console.log('Success:', response);
            },
            error: function (xhr, status, error) {
                console.error('Error:', status, error);
            }
        });

        let ur = document.getElementById('customCheck');
        let file = document.getElementById('thefile');
        ur.checked = false;
        file.value = '';
    });
});