<?php
require_once "../config/config.php";




// start crud proses progress
{
    // start delete progress
    if (isset($_POST['deletep']) && isset($_POST['id_progress'])) {
        $id_progress = $_POST['id_progress'];

        // Use prepared statement
        $stmt = $host->prepare("DELETE FROM `progress_bimbingan` WHERE id_progress = ?");
        $stmt->bind_param("i", $id_progress);

        if ($stmt->execute()) {
            echo "<script>alert('You have successfully deleted the data progress');</script>";
            echo "<script type='text/javascript'> document.location ='table-progress.php'; </script>";
        } else {
            // Jika Gagal, Lakukan :
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
            echo "<script type='text/javascript'> document.location ='table-progress.php'; </script>";
        }

        // Close the statement
        $stmt->close();
    } // end delete progress
} // end crud proses progress



//start crud proses user
{
// Delete User
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Determine the table based on the available tables
    $tables = ['admin', 'dosen', 'mahasiswa'];
    $table = '';

    foreach ($tables as $tableName) {
        $checkQuery = "SELECT 1 FROM $tableName WHERE id_$tableName = $id LIMIT 1";
        $checkResult = mysqli_query($host, $checkQuery);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            $table = $tableName;
            break;
        }
    }

    if (!empty($table)) {
        // Delete user from the appropriate table
        $deleteQuery = "DELETE FROM $table WHERE id_$table = $id";
        $deleteResult = mysqli_query($host, $deleteQuery);

        if ($deleteResult) {
            echo "<script>alert('You have successfully deleted the data');</script>";
            echo "<script type='text/javascript'> document.location ='table-user.php'; </script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }
    } else {
        echo "<script>alert('Invalid user ID.');</script>";
    }
}

} // end crud proses user





// Don't forget to close the connection
mysqli_close($host);
?>
