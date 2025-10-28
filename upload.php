<?php
if(isset($_POST["submit"])){
    $targetdir = "uploads/"; //Direktori tujuan untuk menyimpan file
    $targetfile = $targetdir . basename($_FILES["myfile"]["name"]);
    $fileType = strtolower(pathinfo($targetfile, PATHINFO_EXTENSION));

    $allowedExtensions = array("txt", "pdf", "doc", "docx"); // Perubahan ekstensi
    $maxsize = 3*1024*1024; // Perubahan ukuran maksimum menjadi 3MB

    if (in_array($fileType, $allowedExtensions) && $_FILES["myfile"]["size"]<=$maxsize)
    {
        if(move_uploaded_file($_FILES["myfile"]["tmp_name"], $targetfile)){
            echo "File berhasil diunggah.";
        }
        else{
            echo "Gagal mengunggah file.";
        }
    }
    else{
        echo "File tidak valid atai melebihi ukuran maksimum ";
    }
}
?>
