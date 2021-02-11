$(document).on("click", ".delete-task", function (e) {
    e.preventDefault();
    let data = {};
    data.id = $(this).data('id');
    $.ajax({
        data: data,
        url: "/task/delete",
        method: "POST",
        success: function () {
            $.pjax.reload('#task-grid', {url: window.location.href});
        }
    });
    return false;
});