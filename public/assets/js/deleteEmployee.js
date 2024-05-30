// $(document).ready(function() {
//     var userId, userName, userPosition;

//     // Show confirmation modal on delete button click
//     $('.delete-btn').on('click', function(e) {
//         e.preventDefault();
//         userId = $(this).data('id');
//         userName = $(this).closest('tr').find('td:eq(1)').text();
//         userPosition = $(this).closest('tr').find('td:eq(3)').text();
        
//         $('#deleteMessage').text('Are you sure to delete this user: ' + userName + ' from the database?');
//         $('#deleteConfirmationModal').modal('show');
//     });

//     // Confirm delete
//     $('#confirmDelete').on('click', function() {
//         $.ajax({
//             url: "/Translizer/public/deleteUser",
//             type: "POST",
//             data: {
//                 user_id: userId,
//                 position: userPosition
//             },
//             success: function(response) {
//                 if(response.success) {
//                     location.reload(); // Reload the page to reflect changes
//                 } else {
//                     alert('Error: ' + response.message);
//                 }
//             },
//             error: function() {
//                 alert('An error occurred while deleting the user.');
//             }
//         });
//     });
// });

// Confirm delete action
// $('.delete-btn').on('click', function () {
//     var userId = $(this).data('id');
//     var userName = $(this).closest('tr').find('td:eq(1)').text();
//     $('#deleteMessage').text('Are you sure to delete user: ' + userName + ' from the database?\nNote: When you click on the "Confirm" button, its data will be lost forever.');
//     $('#deleteConfirmationModal').modal('show');
//     $('#confirmDelete').off().on('click', function () {
//         // Set user ID in hidden field
//         $('#user_id').val(userId);
//         // Submit the form
//         $(this).closest('form').submit();
//     });
// });

// // Handle form submission
// $('#confirmDelete').on('click', function () {
//     $('#deleteConfirmationModal').modal('hide'); // Close modal
//     var form = $(this).closest('form');
//     $.post(form.attr('action'), form.serialize(), function (response) {
//         // Handle response here
//         if (response.success) {
//             // Reload or update data table
//             alert('User deleted successfully.');
//         } else {
//             alert('Error deleting user: ' + response.message);
//         }
//     }, 'json');
// });

// $(document).ready(function () {
//     // When delete button in modal is clicked
//     $('#confirmDelete').on('click', function () {
//         var userId = $('#deleteConfirmationModal').data('userId'); // Get the userId from data attribute
//         // Redirect to delete function with userId
//         window.location.href = "<?= base_url('Admin/deleteUser/') ?>" + userId;
//     });

//     // When delete button in dropdown is clicked
//     $('.delete-btn').on('click', function () {
//         var userId = $(this).data('id'); // Get the userId from data attribute
//         $('#deleteConfirmationModal').data('userId', userId); // Set the userId in modal data attribute
//     });
// });