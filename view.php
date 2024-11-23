<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="view.css">
</head>
<body>

<div class="overlay"></div>

<?php
include 'config.php'; 

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Query to fetch the specific row
    $sql = $conn->prepare("SELECT names, age, mobile,insid,gender,states,email,dates,bloodgroup,department FROM patients WHERE id = ?");
    $sql->bind_param('i', $id);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Display the row data
        while ($row = $result->fetch_assoc()) {
            echo '<div id="dvv">';
            echo "Name : " . $row['names'] . "<br>";
            echo "AGE : " . $row['age'] . "<br>";
            echo "MOBLE : " . $row['mobile'] . "<br>";
            echo "INSURANCE ID : " . $row['insid'] . "<br>";
            echo "GENDER : " . $row['gender'] . "<br>";
            echo "STATES : " . $row['states'] . "<br>";
            echo "EMAIL : " . $row['email'] . "<br>";
            echo "ENROLLMENT DATE : " . $row['dates'] . "<br>";
            echo "BLOOD GROUP : " . $row['bloodgroup'] . "<br>";
            echo "DEPARTMENT FOR CONSULTATION : " . $row['department'] . "<br>";
            echo '</div>';
         
        }
    } else {
        echo "No data found for ID: $id";
    }
} else {
    echo "No ID provided.";
}
?>

    
</body>
</html>