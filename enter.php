<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class='overlay'></div>

<?php
include 'config.php';
$name=$age=$ph=$ins='';
$nmerr=$agerr=$pherr=$inser='';

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

    
    $ins=pp_pp($_POST['insid']);
    if(empty( $ins=pp_pp($_POST['insid']))){
        $inser='enter your insurance id';
    }

    else{
        $ins=pp_pp($_POST['insid']);
    }

}

function pp_pp($data){
    $data=stripslashes($data);
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

$sql=$conn->prepare('INSERT INTO patients(names,age,mobile,insid) VALUES(?,?,?,?)');

$sql->bind_param("siss",$name,$age,$ph,$ins);
if($name==''|| $age==''|| $ph=='' || $ins==''){
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

<div class='fmmv'>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

<input type="text" name='name' class="inpt" placeholder="enter your name"> <p class='err'><?php  echo $nmerr;?></p> <br>
<input type="text" name='age' class="inpt" placeholder="enter your age">  <p class='err'><?php  echo $agerr;?></p> <br>
<input type="text" name='phone' class="inpt" placeholder="enter your mobile"> <p class='err'><?php  echo $pherr;?></p><br>


<input type="text" class="inpt" placeholder="enter your insurance id" name="insid">  <p class='err'><?php  echo $inser;?></p> <br>

<input type="submit" value='submit' class="sbmt"> <br> 



<!-- <button class="sbt1"><a href='cl.php' class='sd'>STAFF LIST</a></button> -->



<!-- <button onclick='sp()'>click</button> -->


</form>


</div>



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