
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

$(document).ready(function() {
    // عند النقر على زر "Save Team"
    $('.saveTeam').click(function() {
        // استخدم قالبًا للكارد الجديد
        var newCardTemplate = `
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <a href="#collapseCardExample" class="d-block card-header py-3 collapsed border-left-primary"
                        data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">New Team</h6>
                    </a>
                    <div class="collapse" id="collapseCardExample">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Incomplete Tasks</th>
                                        <th>Completed Tasks</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Add rows dynamically here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>`;
        
        // أضف الكارد الجديد إلى نهاية عنصر الصفحة الذي يحتوي على الكاردات
        $('.row').append(newCardTemplate);

        // أغلق النافذة المنبثقة بعد النقر على زر "Save Team"
        $('#addTeamModal').modal('hide');
    });
});
