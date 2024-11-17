<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cl.css">
</head>
<body>

<?php

include 'config.php';

$sql='SELECT * FROM patients';
$result=$conn->query($sql);

if($result->num_rows >0){
    while($row=$result->fetch_assoc()){

        echo '<form method="POST" action="delete.php" onsubmit="return confirm(\'Are you sure you want to delete?\')">';

        echo '<table border="2"  cellspacing="20px" cellpadding="20px" class="tbb">';

        echo '<tr>';
       
        echo '<td  class="trr">';
        echo $row['names'].'<br>';
        echo '</td>';
        echo '<td>';
        echo $row['age'].'<br>';
        echo '</td>';
        echo '<td>';
        echo $row['mobile'].'<br>';
      
       
      

        echo '</td>';
        echo '<td>';
        // Hidden input to send the ID of the row to be deleted
        echo '<input type="hidden" name="id" value="' . $row['id'] . '">';

        echo '<button type="submit">Delete</button>';
        echo '</td>';
      
        echo '<br>';
       
        echo '</tr>';

        echo '</table>';

        echo '</form>';
    }
}
else{
    echo '';
}

$conn->close()




?>

<a href='enter.php'><button>CLICK TO ADD NEW </button>
</a>




</body>
</html>