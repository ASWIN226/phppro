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
$name=$age=$ph=$ins=$gen=$state='';
$nmerr=$agerr=$pherr=$inser=$gener=$stterr='';

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

      
    $gen=pp_pp($_POST['gender']);
    if($gen==''){
        $gener='Choose Gender';
    }
    else{
        $gen=pp_pp($_POST['gender']);
    }

      
    $state=pp_pp($_POST['state']);
    if($state==''){
        $stterr='Choose state';
    }
    else{
        $state=pp_pp($_POST['state']);
    }




}

function pp_pp($data){
    $data=stripslashes($data);
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

$sql=$conn->prepare('INSERT INTO patients(names,age,mobile,insid,gender,states) VALUES(?,?,?,?,?,?)');

$sql->bind_param("sissss",$name,$age,$ph,$ins,$gen,$state);
if($name==''|| $age==''|| $ph=='' || $ins=='' || $gen==''||$state==''){
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

<select name="gender" id="sl" class="inpts">
<option value="">Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>

</select> <p class='err'><?php  echo $gener;?></p> <br> 


<div class="secdiv">
    
<select name="state" id="stt" class="inpts">
    <option value="">State</option>
    <option value="Andhra Pradesh">Andhra Pradesh</option>
<option value="Arunachal Pradesh">Arunachal Pradesh</option>
<option value="Assam">Assam</option>
<option value="Bihar">Bihar</option>
<option value="Chhattisgarh">Chhattisgarh</option>
<option value="Goa">Goa</option>
<option value="Gujarat">Gujarat</option>
<option value="Haryana">Haryana</option>
<option value="Himachal Pradesh">Himachal Pradesh</option>
<option value="Jharkhand">Jharkhand</option>
<option value="Karnataka">Karnataka</option>
<option value="Kerala">Kerala</option>
<option value="Madhya Pradesh">Madhya Pradesh</option>
<option value="Maharashtra">Maharashtra</option>
<option value="Manipur">Manipur</option>
<option value="Meghalaya">Meghalaya</option>
<option value="Mizoram">Mizoram</option>
<option value="Nagaland">Nagaland</option>
<option value="Odisha">Odisha</option>
<option value="Punjab">Punjab</option>
<option value="Rajasthan">Rajasthan</option>
<option value="Sikkim">Sikkim</option>
<option value="Tamil Nadu">Tamil Nadu</option>
<option value="Telangana">Telangana</option>
<option value="Tripura">Tripura</option>
<option value="Uttar Pradesh">Uttar Pradesh</option>
<option value="Uttarakhand">Uttarakhand</option>
<option value="West Bengal">West Bengal</option>
<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
<option value="Chandigarh">Chandigarh</option>
<option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
<option value="Delhi">Delhi</option>
<option value="Lakshadweep">Lakshadweep</option>
<option value="Puducherry">Puducherry</option>
<option value="Jammu and Kashmir">Jammu and Kashmir</option>
<option value="Ladakh">Ladakh</option>

   
</select> <p class='err'><?php  echo $stterr;?></p> 


</div>

<input type="submit" value='submit' class="sbmt"> 



<!-- <button class="sbt1"><a href='cl.php' class='sd'>STAFF LIST</a></button> -->



<!-- <button onclick='sp()'>click</button> -->


</form>


<button class="sbt1"><a href='cl.php' class='sd'>Patients List</a></button>


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