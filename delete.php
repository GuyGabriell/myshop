<?php 

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myshop";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check if connection succeeded
    //if ($conn->connect_error) {
    //    die("Connection failed: " . $conn->connect_error);
    //}

    // Make sure the id is sanitized to avoid SQL injection
    //$id = $conn->real_escape_string($id);

    // SQL DELETE query - make sure to add your table name
    $sql = "DELETE FROM clients WHERE id=$id";
    

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    // Close connection
    $conn->close();
}

// Redirect after deletion
header("Location: /index.php");
exit;

?>
