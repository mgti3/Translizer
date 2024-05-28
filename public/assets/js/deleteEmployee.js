// Wait for the document to be ready
$(document).ready(function () {
    // Attach click event listener to delete buttons
    $('.delete-btn').click(function (e) {
        e.preventDefault(); // Prevent default action

        // Get employee ID and name
        var userId = $(this).data('id');
        var userName = $(this).data('name');

        // Display confirmation message
        var confirmDelete = confirm('Are you sure you want to delete employee ' + userName + '?');

        // If user confirms, proceed with deletion
        if (confirmDelete) {
            // Redirect to delete action with user ID
            window.location.href = 'Admin/deleteEmployee/' + userId;
        }
    });
});