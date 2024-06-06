document.addEventListener('DOMContentLoaded', function () {
    const showToastButton = document.getElementById('sub-btn');
    const toastElement = document.getElementById('toastContainer');

    showToastButton.addEventListener('click', function () {
        // Show the toast
        const toastContainer = document.getElementById('toastContainer');
        const toastElement = toastContainer.querySelector('.toast');

        document.querySelector('.toast-body').innerText = "Report Submitted.";
        // Show the toast container
        toastContainer.classList.add('show');

        // Initialize and show the toast
        $(toastElement).toast('show');

        // Hide the toast container after 3 seconds
        setTimeout(() => {
            toastContainer.classList.remove('show');
        }, 5000);
    });
});

