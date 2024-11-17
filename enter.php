<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include 'config.php';
$name=$age=$ph='';
$nmerr=$agerr=$pherr='';

if($_SERVER['REQUEST_METHOD']==='POST'){
    $name=pp_pp($_POST['name']);
    if(empty( $name=pp_pp($_POST['name']))){
        $nmerr='enter your name ';
    }

    else{
        $name=pp_pp($_POST['name']);

    }

    $age=pp_pp($_POST['age']);

    if(empty($age=pp_pp($_POST['age']))){
        $agerr='enter your age';
    }

    else{
        $age=pp_pp($_POST['age']);

    }


    $ph=pp_pp($_POST['phone']);
    if(empty( $ph=pp_pp($_POST['phone']))){
        $pherr='enter your mobile number';
    }

    else{
        $ph=pp_pp($_POST['phone']);
    }

}

function pp_pp($data){
    $data=stripslashes($data);
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

$sql=$conn->prepare('INSERT INTO patients(names,age,mobile) VALUES(?,?,?)');

$sql->bind_param("sis",$name,$age,$ph);
if($name==''|| $age==''|| $ph==''){
    echo '';
}

else{
    $sql->execute();
    header('location:cl.php');
    exit();


   
}


$sql->close();
$conn->close();




?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

<input type="text" name='name' class="inpt" placeholder="enter your name"> <p class='err'><?php  echo $nmerr;?></p> <br>
<input type="text" name='age' class="inpt" placeholder="enter your age">  <p class='err'><?php  echo $agerr;?></p> <br>
<input type="text" name='phone' class="inpt" placeholder="enter your mobile"> <p class='err'><?php  echo $pherr;?></p><br>
<br>

<input type="submit" value='submit' class="sbmt"> <br> <br>



<button class="sbmt"><a href='cl.php' class='sd'>STAFF LIST</a></button>



<!-- <button onclick='sp()'>click</button> -->


</form>



<?php


if($name=='' || $age=='' || $ph==''){
    echo ' ';
}

else{
    echo $name;
    echo '<br>';
    echo $age;
    echo "<br>";

    echo $ph;




}


?>





<script src='script.js'>
    

</script>





</body>
</html>