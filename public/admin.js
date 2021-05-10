$("#checkall").change(function () {
    $(".checkitem").prop("checked", $(this).prop("checked"))
});
$('#calendar').datetimepicker({
    format: 'L',
    inline: true
})
$(function () {
    bsCustomFileInput.init();
});

$(document).ready(function () {
    // datatables
    $('#datapengumuman').DataTable({
        "scrollX": true
    });
    $('#dataagenda').DataTable({
        "scrollX": true
    });
    $('#datamateri').DataTable({
        "scrollX": true
    });

    // end datatables


    //Date range picker
    $('#mulai').datetimepicker({
        format: 'L'
    });
    $('#selesai').datetimepicker({
        format: 'L'
    });
    //end Date range picker

    // form editor
    // Summernote
    $('#summernote').summernote()
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
    });
    // end form editor
});

// var img=document.forms['quickForm']['avatar'];
$(function () {
    $('#quickForm').validate({
        rules: {
            avatar: {
                extension: "jpg,jpeg,png",
                required: false,
            },
        },
        messages: {
            avatar: {
                extension: "format file harus jpg,jpeg,png",

            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
$(function () {
    $('#formberita').validate({
        rules: {
            berita_gambar: {
                extension: "jpg,jpeg,png",
                required: false,
            },
        },
        messages: {
            berita_gambar: {
                extension: "format file harus jpg,jpeg,png",

            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});

var uploadField = document.getElementById("avatar");
uploadField.onchange = function () {
    if (this.files[0].size > 400000) {
        alert("File Maximal 400 kb");
        this.value = "";
    };
};
