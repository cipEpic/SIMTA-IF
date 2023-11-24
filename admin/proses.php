<?php
require_once "../config/config.php";

// start crud proses progress
{
    // start proses forms progress
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["forms-validationtw"])) {
        // Retrieve form data
        $nip = $_POST["NIP"];
        $nim = $_POST["NIM"];
    
        // Check if the Dosen NIP and Mahasiswa NIM exist in the database
        $queryDosen = "SELECT id_dosen FROM dosen WHERE NIP = '$nip'";
        $resultDosen = mysqli_query($host, $queryDosen);
        $queryMahasiswa = "SELECT id_mahasiswa FROM mahasiswa WHERE NIM = '$nim'";
        $resultMahasiswa = mysqli_query($host, $queryMahasiswa);
    
        if ($resultDosen && $resultMahasiswa) {
            $rowDosen = mysqli_fetch_assoc($resultDosen);
            $rowMahasiswa = mysqli_fetch_assoc($resultMahasiswa);
    
            // Add progress data to the database
            $queryAddProgress = "INSERT INTO progress_bimbingan (id_mahasiswa, id_dosen) VALUES ($rowMahasiswa[id_mahasiswa], $rowDosen[id_dosen])";
            $resultAddProgress = mysqli_query($host, $queryAddProgress);
    
            if ($resultAddProgress) {
                echo "<script>alert('You have successfully add the data progress');</script>";
                echo "<script type='text/javascript'> document.location ='table-progress.php'; </script>";
            } else {
                // Jika Gagal, Lakukan :
                echo "<script>alert('Something Went Wrong. Please try again');</script>";
                echo "<script type='text/javascript'> document.location ='table-progress.php'; </script>";
            }
    }
    }
    //end prosess form progress


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

// start proses forms user
if (isset($_POST['forms-user'])) {
    // Get form data
    $userType = $_POST['userType'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $nipNim = isset($_POST['nipNim']) ? $_POST['nipNim'] : null;

    // Insert data into the appropriate table based on user type
    switch ($userType) {
        case 'admin':
            // Insert data into the admin table
            $query = "INSERT INTO admin (NIP, username, nama, password, email, no_telp) VALUES ('$nipNim', '$name', '$name', '$password', '$email', '$no_telp')";
            break;
        case 'dosen':
            // Insert data into the dosen table
            $query = "INSERT INTO dosen (NIP, username, nama_dosen, password, email, no_telp) VALUES ('$nipNim', '$name', '$name', '$password', '$email', '$no_telp')";
            break;
        case 'mahasiswa':
            // Insert data into the mahasiswa table
            $query = "INSERT INTO mahasiswa (NIM, username, nama_mahasiswa, password, email, no_telp) VALUES ('$nipNim', '$name', '$name', '$password', '$email', '$no_telp')";
            break;
        default:
            // Handle other user types or show an error
            die("Invalid user type");
    }

    // Execute the query
    $result = mysqli_query($host, $query);

    // Check if the query was successful
    if ($result) {
        echo "Data added successfully!";
        echo "<script>alert('You have successfully inserted the data user');</script>";
            echo "<script type='text/javascript'> document.location ='table-user.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
            echo "<script type='text/javascript'> document.location ='forms-user.php'; </script>";
    }

} // end proses forms user


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



// //start crud public form
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id_mahasiswa = $_POST["id_mahasiswa"];
//     $id_progress = $_POST["id_progress"];

//     // Loop through each checkbox and update the corresponding column in the database
//     foreach ($_POST["progress"] as $progress) {
//         $updateColumn = mysqli_real_escape_string($host, $progress);

//         // Ubah nilai 0 menjadi 1, dan nilai 1 menjadi 0
//         $query = "UPDATE progress_bimbingan SET $updateColumn = 1 - $updateColumn WHERE id_mahasiswa = $id_mahasiswa AND id_progress = $id_progress";
//         mysqli_query($host, $query);
//     }

//     // Handle file uploads if needed

//     // Redirect back to the edit page or another page
//     header("Location: editdosen.php?id_mahasiswa=$id_mahasiswa");
//     exit();
// }


// Don't forget to close the connection
mysqli_close($host);
?>
