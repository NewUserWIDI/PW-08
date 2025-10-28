$(document).ready(function(){
    $('#upload-form').submit(function(e){
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: 'upload_ajax.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response){
                $('#status').html(response);
            },
            error: function(){
                $('#status').html('Terjadi kesalahan saat mengunggah file.');
            }
        });
    });
});



$(document).ready(function () {
    $("#upload-form").submit(function (e) {
        e.preventDefault(); // Mencegah reload halaman

        var formData = new FormData(this); // Ambil data dari form

        $.ajax({
            type: "POST",
            url: "upload_ajax.php", // File PHP tujuan
            data: formData,
            cache: false, // HARUS tanpa tanda kutip
            contentType: false,
            processData: false,
            success: function (response) {
                $("#status").html(response);
            },
            error: function () {
                $("#status").html("Terjadi kesalahan saat mengunggah file.");
            },
        });
    });
});
