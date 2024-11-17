<!DOCTYPE html>
<html lang="en">
<head>
    <!-- font aweasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

        // echo '<form method="POST" action="delete.php">';

        echo '<table border="2"  cellspacing="20px" cellpadding="20px" class="tbb">';
        echo " <th>Name</th>";
        echo " <th>Age</th>";
        echo " <th>Mobile</th>";
        echo " <th>Insurance Id</th>";
        echo " <th>Action</th>";
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
        echo $row['insid'].'<br>';
    
        echo '</td>';

        echo '<td>';
        // Hidden input to send the ID of the row to be deleted
        // echo '<input type="hidden" name="id" value="' . $row['id'] . '">';

        echo '<input type="hidden" name="id" value=' .$row['id'] .'></input>';
        
        echo '<button type="submit" class="btnc"><i class="fa-solid fa-trash fa-2xl"></i></button>';
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