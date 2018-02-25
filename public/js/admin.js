$(function(){
    $("input[type=file]").change(function () {
        var fieldVal = $(this).val();
        if (fieldVal == "" || fieldVal == undefined) {
            $(this).next(".custom-file-control").attr('data-content', "Choose file...");
            return;
        }

        // Get the file name from the file path
        // For example, uploading from Chrome returns "C:\fakepath\eevee.png"
        var fileName = "";
        if (fieldVal.split("\\").length > 2) {
            fileName = fieldVal.split("\\").pop();
        } else if (fieldVal.split("/").length > 2) {
            fileName = fieldVal.split("/").pop();
        } else {
            fileName = fieldVal;
        }

        $(this).next(".custom-file-control").attr('data-content', fileName);
    });
});