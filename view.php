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

            echo "<span class='sp'>";
            echo "Name : " . $row['names'] . "<br>";
            echo "</span>";

            echo "<span class='sp'>";
            echo "Age : " . $row['age'] . "<br>";
            echo "</span>";

            echo "<span class='sp'>";
            echo "Mobile : " . $row['mobile'] . "<br>";
            echo "</span>";

            echo "<span class='sp'>";
            echo "Insurance Id : " . $row['insid'] . "<br>";
            echo "</span>";


            echo "<span class='sp'>";
            echo "Gender : " . $row['gender'] . "<br>";
            echo "</span>";

            echo "<span class='sp'>";
            echo "State : " . $row['states'] . "<br>";
            echo "</span>";


            echo "<span class='sp'>";
            echo "Email : " . $row['email'] . "<br>";
            echo "</span>";


            echo "<span class='sp'>";
            echo "Enrollment Date : " . $row['dates'] . "<br>";
            echo "</span>";


            echo "<span class='sp'>";
            echo "Blood Group : " . $row['bloodgroup'] . "<br>";
            echo "</span>";


            echo "<span class='sp'>";
            echo "Department for Consultation : " . $row['department'] . "<br>";
            echo "</span>";


            echo '<a href="cl.php" class="btn">PATIENTS LIST</a>';
            echo '</div>';
         
        }
    } else {
        echo "No data found for ID: $id";
    }
} else {
    echo "No ID provided.";
}
?>



<div class="snow-container"></div>
<div style="height: 200vh;">



<script src="index.js"></script>


    
</body>
</html>