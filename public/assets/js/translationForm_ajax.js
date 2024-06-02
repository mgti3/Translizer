$('#translationSub').submit(function (event) {
    event.preventDefault();
    let formData = new FormData(this);
    $.ajax({
        url: '/Translizer/public/translationSubmit',
        type: 'POST',
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            if (response.status === 'success') {
                const toastContainer = document.getElementById('toastContainer');
                const toastElement = toastContainer.querySelector('.toast');

                document.querySelector('.toast-body').innerText = "translation uploaded successfuly";
                // Show the toast container
                toastContainer.classList.add('show');

                // Initialize and show the toast
                $(toastElement).toast('show');

                // Hide the toast container after 3 seconds
                setTimeout(() => {
                    toastContainer.classList.remove('show');
                }, 5000);
                console.log("translation uploaded successfuly")

            } else if (response.status === 'error') {
                document.getElementById("errors").innerHTML = (response.validate);
            }
        },
        error: function (xhr, status, error) {
            console.error('Error:', status, error);
        }
    });


});