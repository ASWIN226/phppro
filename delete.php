<?php
include 'config.php'; // Database connection


if (isset($_POST['id'])) {
    $id = intval($_POST['id']); 
   
    $sql = "DELETE FROM patients WHERE id = $id";
    
  
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully!";
       
        header('Location: cl.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
