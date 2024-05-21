
$(document).ready(function () {
    $("#myButton").click(function () {
        $.ajax({
            url: 'http://localhost/Translizer/public/clicked',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                console.log(JSON.stringify(data));
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

});
