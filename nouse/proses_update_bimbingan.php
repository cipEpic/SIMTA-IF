<?php
// Include your database configuration file
require_once "../config/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve values from the form
    $id_mahasiswa = isset($_POST['id_mahasiswa']) ? $_POST['id_mahasiswa'] : null;

    // Check if $id_mahasiswa is set
    if ($id_mahasiswa === null) {
        // Redirect or handle the error accordingly
        header("Location: some_error_page.php");
        exit();
    }

    // Continue with the rest of your code...

    // Retrieve the current progress data from the database
    $query = "SELECT * FROM progress_bimbingan WHERE id_mahasiswa = $id_mahasiswa";
    $result = mysqli_query($host, $query);

    if ($result) {
        $currentProgress = mysqli_fetch_assoc($result);

        // Process each checkbox value and update the database
        foreach ($_POST['progress'] as $checkboxValue) {
            $checkboxValue = mysqli_real_escape_string($host, $checkboxValue);

            // Check if the checkbox was unchecked (previously checked and now unchecked)
            if (!isset($_POST['progress']) || !in_array($checkboxValue, $_POST['progress'])) {
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

    }

    // Additional code for handling file uploads (if needed)

    // Redirect back to the editdosen.php page or any other appropriate page
    header("Location: editdosen.php?id_mahasiswa=$id_mahasiswa");
    exit();
} else {
    // If the form is not submitted through POST, redirect to a suitable page
    header("Location: some_error_page.php");
    exit();
}
?>
