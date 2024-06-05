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

    // تعيين قيمة الحقل المخفي إلى "edit"
    $("#operation").val("edit");
    $("#user_id").val(id);

    $("input[name='username']").val(name);
    $("input[name='email']").val(email);
    $("select[name='Role']").val(position);
    $("select[name='dep']").val(team);

    $("button[type='submit']").text("Edit");
});

$("form.user").submit(function() {
    setTimeout(function() {
        $("#operation").val("add");
        $("#user_id").val("");
        $("button[type='submit']").text("Submit");
    }, 1000); // إعادة تعيين القيم بعد ثانية واحدة
});
