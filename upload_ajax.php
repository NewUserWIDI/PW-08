<?php
if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    @$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
    $extensions = array("pdf", "doc", "docx", "txt");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "documents/" . $file_name);
        echo "File berhasil diunggah.";
    } else {
        echo implode(" ", $errors);
    }
}
?>
<?php
if (isset($_FILES['files'])) {
    $extensions = array("jpg", "jpeg", "png", "gif");
    $messages = array(); // Untuk menyimpan status setiap file

    foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['files']['name'][$key];
        $file_size = $_FILES['files']['size'][$key];
        $file_tmp = $_FILES['files']['tmp_name'][$key];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $errors = array(); // Reset errors untuk setiap file

        if (!in_array($file_ext, $extensions)) {
            $errors[] = "Bukan file gambar yang valid.";
        }

        if ($file_size > 2097152) {
            $errors[] = "Ukuran lebih dari 2 MB.";
        }

        if (empty($errors)) {
            if (move_uploaded_file($file_tmp, "documents/" . $file_name)) {
                $messages[] = "$file_name berhasil diunggah.";
            } else {
                $messages[] = "$file_name gagal diunggah.";
            }
        } else {
            $messages[] = "$file_name: " . implode(", ", $errors);
        }
    }

    echo implode("<br>", $messages);
}
?>
