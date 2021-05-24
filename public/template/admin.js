$("#checkall").change(function () {
    $(".checkitem").prop("checked", $(this).prop("checked"));
});
$('#calendar').datetimepicker({
    format: 'L',
    inline: true
});
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
    $('#summernote').summernote();
    $('#summernote1').summernote();
    $('#summernote2').summernote();
    $('#summernote3').summernote();
    $('#summernote4').summernote();
    $('#summernote5').summernote();
    $('#summernote6').summernote();
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


var tentangkami = document.getElementById("idtentangkami");
tentangkami.onchange = function () {
    if (this.files[0].size > 400000) {
        alert("File Maximal 400 kb");
        this.value = "";
    };
};

$(function () {
    $('#formtentangkami').validate({
        rules: {
            gambar: {
                extension: "jpg,jpeg,png",
                // required: false,
            },
        },
        messages: {
            gambar: {
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
    $('#formvisimisi').validate({
        rules: {
            gambar: {
                extension: "jpg,jpeg,png",
                // required: false,
            },
        },
        messages: {
            gambar: {
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
var visimisi = document.getElementById("idvisimisi");
visimisi.onchange = function () {
    if (this.files[0].size > 400000) {
        alert("File Maximal 400 kb");
        this.value = "";
    };
};





