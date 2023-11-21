<?php
// Include your database configuration file
require_once "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $id_mahasiswa = isset($_POST['id_mahasiswa']) ? $_POST['id_mahasiswa'] : null;
    $id_progress = isset($_POST['id_progress']) ? $_POST['id_progress'] : null;

    // Check if $id_mahasiswa and $id_progress are set
    if ($id_mahasiswa === null || $id_progress === null) {
        // Redirect or handle the error accordingly
        header("Location: some_error_page.php");
        exit();
    }

    // Process each checkbox value and update the database
    foreach ($_POST['progress'] as $checkboxValue) {
        $checkboxValue = mysqli_real_escape_string($host, $checkboxValue);

        // Check if the checkbox was unchecked (previously checked and now unchecked)
        if (!in_array($checkboxValue, $_POST['progress'])) {
            // If unchecked, update the corresponding column to 0
            $updateQuery = "UPDATE progress_bimbingan SET $checkboxValue = 0 WHERE id_mahasiswa = $id_mahasiswa";
        } else {
            // If checked, update the corresponding column to 1
            $updateQuery = "UPDATE progress_bimbingan SET $checkboxValue = 1 WHERE id_mahasiswa = $id_mahasiswa";
        }

        // Execute the update query
        mysqli_query($host, $updateQuery);
        // You might want to check for errors and handle them accordingly
    }

    
    // Repeat the process for other textareas (file_revisi_bab1, file_revisi_bab2, etc.)
    $file_revisi_pendahuluan_content = isset($_POST['file_revisi_pendahuluan']) ? $_POST['file_revisi_pendahuluan'] : '';
    $file_revisi_bab1_content = isset($_POST['file_revisi_bab1']) ? $_POST['file_revisi_bab1'] : '';
    $file_revisi_bab2_content = isset($_POST['file_revisi_bab2']) ? $_POST['file_revisi_bab2'] : '';
    $file_revisi_bab3_content = isset($_POST['file_revisi_bab3']) ? $_POST['file_revisi_bab3'] : '';
    $file_revisi_bab4_content = isset($_POST['file_revisi_bab4']) ? $_POST['file_revisi_bab4'] : '';
    $file_revisi_bab5_content = isset($_POST['file_revisi_bab5']) ? $_POST['file_revisi_bab5'] : '';
    $file_revisi_akhir_content = isset($_POST['file_revisi_akhir']) ? $_POST['file_revisi_akhir'] : '';

    // Update the corresponding columns in the database with the text content
    $updateFileQuery = "UPDATE progress_bimbingan SET file_revisi_pendahuluan = ?, file_revisi_bab1 = ?, file_revisi_bab2 = ?, file_revisi_bab3 = ?, file_revisi_bab4 = ?, file_revisi_bab5 = ?, file_revisi_akhir = ? WHERE id_mahasiswa = ?";
    $stmt = mysqli_prepare($host, $updateFileQuery);

    // Use "s" for each parameter in the bind_param call
    mysqli_stmt_bind_param($stmt, "sssssssi", $file_revisi_pendahuluan_content, $file_revisi_bab1_content, $file_revisi_bab2_content, $file_revisi_bab3_content, $file_revisi_bab4_content, $file_revisi_bab5_content, $file_revisi_akhir_content, $id_mahasiswa);

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);


    // Redirect back to the edit page or any other appropriate page
    header("Location: editdosen.php?id_mahasiswa=$id_mahasiswa");
    exit();
} else {
    // If the form is not submitted through POST, redirect to a suitable page
    header("Location: some_error_page.php");
    exit();
}
?>
