$(function () {
    $('.modalButton').click(function (e) {
        e.preventDefault(); //for prevent default behavior of <a> tag.
        var tagname = $(this)[0].tagName;
        $('#editModalId').modal('show').find('.modalContent').load($(this).attr('href'));
    });
});

$(function () {
    $("body").on("beforeSubmit", "form#form-update-id", function () {
        var form = $(this);
        // return false if form still have some validation errors
        if (form.find(".has-error").length) {
            return false;
        }
        // submit form
        $.ajax({
            url: form.attr("action"),
            type: "post",
            data: form.serialize(),
            success: function (response) {
                $("#editModalId").modal("toggle");
                $.pjax.reload({container: "#gridview-container-id"}); //for pjax update
            },
            error: function () {
                //console.log("internal server error");
            }
        });
        return false;
    });
});
