

// $(document).ready(function () {

//     $('#registerId').submit(function (event) {
//         event.preventDefault();
//         let formData = new FormData(this);
//         $.ajax({
//             url: '/Translizer/public/registration',
//             type: 'POST',
//             data: formData,
//             contentType: false,
//             cache: false,
//             processData: false,
//             success: function (response) {
//                 console.log(response['validate'])
//             },
//             error: function (xhr, status, error) {
//                 console.log(response['validate'])
//             }
//         });
//     });
// });

$(document).ready(function () {
    $('#registerId').submit(function (event) {
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
            url: '/Translizer/public/registration',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message); // Optionally show a success message
                    window.location.href = response.redirect; // Redirect to login page
                } else if (response.status === 'error') {
                    document.getElementById("errors").innerHTML=(response.validate);
                    console.log(response.validate); // Log or display validation errors
                }
            },
            error: function (xhr, status, error) {
                console.log('An error occurred:', error);
            }
        });
    });
});
