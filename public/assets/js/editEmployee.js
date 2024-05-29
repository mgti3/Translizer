// $(".edit-btn").click(function(e) {
//     e.preventDefault();

//     var id = $(this).data("id");
//     var name = $(this).data("name");
//     var email = $(this).data("email");
//     var position = $(this).data("position");
//     var team = $(this).data("team");

//     $("input[name='username']").val(name);
//     $("input[name='email']").val(email);
//     $("select[name='Role']").val(position);
//     $("select[name='dep']").val(team);
//     $("input[name='user_id']").val(id);

//     $("button[type='submit']").text("Edit");
// });

$(".edit-btn").click(function(e) {
    e.preventDefault();

    var id = $(this).data("id");
    var name = $(this).data("name");
    var email = $(this).data("email");
    var position = $(this).data("position");
    var team = $(this).data("team");
    // alert(id);

    // تعيين قيمة الحقل الخفي إلى "edit"
    $("#operation").val("edit");

    $("input[name='username']").val(name);
    $("input[name='email']").val(email);
    $("select[name='Role']").val(position);
    $("select[name='dep']").val(team);
    $("select[name='user_id']").val(id);

    $("button[type='submit']").text("Edit");
});




