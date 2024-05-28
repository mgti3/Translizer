$(".edit-btn").click(function(e) {
    e.preventDefault();

    var id = $(this).data("id");
    var name = $(this).data("name");
    var email = $(this).data("email");
    var position = $(this).data("position");
    var team = $(this).data("team");

    $("input[name='username']").val(name);
    $("input[name='email']").val(email);
    $("select[name='Role']").val(position);
    $("select[name='dep']").val(team);
    
    // تعيين قيمة المعرف المخفي
    $("input[name='user_id']").val(id);

    $("button[type='submit']").text("Edit");
});


