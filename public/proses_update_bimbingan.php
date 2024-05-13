<?php
// Include your database configuration file
require_once "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve values from the form
    $id_progress = isset($_POST['id_progress']) ? $_POST['id_progress'] : 0;

    // Check if $id_progress is set
    if ($id_progress === null) {
        // Redirect or handle the error accordingly
        header("Location: some_error_page.php");
        exit();
    }

    // Process each checkbox value and update the database
    foreach ($_POST['progress'] as $checkboxValue) {
        $checkboxValue = mysqli_real_escape_string($host, $checkboxValue);

        // Check if the checkbox was unchecked (previously checked and now unchecked)
        $isChecked = in_array($checkboxValue, $_POST['progress']) ? 1 : 0;

        // Update the corresponding column
        $updateQuery = "UPDATE progress_bimbingan SET $checkboxValue = $isChecked WHERE id_progress = $id_progress";

        // Execute the update query
        $result = mysqli_query($host, $updateQuery);

        // Check for errors
        if ($result === false) {
            $errorMessage = mysqli_error($host);
            die("Checkbox Update Failed: " . $errorMessage); // Output detailed error message
        }
    }

    // Repeat the process for other textareas (file_revisi_bab1, file_revisi_bab2, etc.)
    $file_revisi_pendahuluan_content = isset($_POST['file_revisi_pendahuluan']) ? $_POST['file_revisi_pendahuluan'] : '';
    $file_revisi_bab1_content = isset($_POST['file_revisi_bab1']) ? $_POST['file_revisi_bab1'] : '';
    $file_revisi_bab2_content = isset($_POST['file_revisi_bab2']) ? $_POST['file_revisi_bab2'] : '';
    $file_revisi_bab3_content = isset($_POST['file_revisi_bab3']) ? $_POST['file_revisi_bab3'] : '';
    $file_revisi_bab4_content = isset($_POST['file_revisi_bab4']) ? $_POST['file_revisi_bab4'] : '';
    $file_revisi_bab5_content = isset($_POST['file_revisi_bab5']) ? $_POST['file_revisi_bab5'] : '';
    $file_revisi_akhir_content = isset($_POST['file_revisi_akhir']) ? $_POST['file_revisi_akhir'] : '';
    
    // Retrieve next deadline from the form
    $next_deadline = isset($_POST['next_deadline']) ? $_POST['next_deadline'] : '';

    // Update the corresponding columns in the database with the text content and next deadline
    $updateFileQuery = "UPDATE progress_bimbingan SET file_revisi_pendahuluan = ?, file_revisi_bab1 = ?, file_revisi_bab2 = ?, file_revisi_bab3 = ?, file_revisi_bab4 = ?, file_revisi_bab5 = ?, file_revisi_akhir = ?, next_deadline = ? WHERE id_progress = ?";
    $stmt = mysqli_prepare($host, $updateFileQuery);

    // Use "s" for each parameter in the bind_param call
    mysqli_stmt_bind_param($stmt, "ssssssssi", $file_revisi_pendahuluan_content, $file_revisi_bab1_content, $file_revisi_bab2_content, $file_revisi_bab3_content, $file_revisi_bab4_content, $file_revisi_bab5_content, $file_revisi_akhir_content, $next_deadline, $id_progress);

    // Execute the file update query
    $fileResult = mysqli_stmt_execute($stmt);

    // Check for errors
    if ($fileResult === false) {
        $errorMessage = mysqli_stmt_error($stmt);
        die("File Update Failed: " . $errorMessage); // Output detailed error message
    }

    mysqli_stmt_close($stmt);

    // Redirect back to the edit page or any other appropriate page
    header("Location: editdosen.php?id_progress=$id_progress");
    exit();
} else {
    // If the form is not submitted through POST, redirect to a suitable page
    header("Location: some_error_page.php");
    exit();
}
?>
