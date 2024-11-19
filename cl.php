<!DOCTYPE html>
<html lang="en">
<head>
    <!-- font aweasome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cl.css">
<!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


</head>
<body>

<div class='over'></div>
<div class="container ">
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
        echo " <th>Gender</th>";
        echo " <th>State</th>";
        echo " <th>e-mail id</th>";
        echo " <th>Enroll Date</th>";
        echo " <th>Blood Group</th>";
        echo " <th>Department for Consultation</th>";
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
        echo $row['gender'].'<br>';
    
        echo '</td>';

        echo '<td>';
        echo $row['states'].'<br>';
    
        echo '</td>';

        
        echo '<td>';
        echo $row['email'].'<br>';
    
        echo '</td>';

         
        echo '<td>';
        echo $row['dates'].'<br>';
    
        echo '</td>';

          
        echo '<td>';
        echo $row['bloodgroup'].'<br>';
    
        echo '</td>';

           
        echo '<td>';
        echo $row['department'].'<br>';
    
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

<div class="container col-sm"> 
<a href='enter.php' class='btn btn-warning p-2 '>Click to Add
</a>
</div>

</div>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>