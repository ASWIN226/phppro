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
$name=$age=$ph=$ins=$gen=$state=$email=$date=$blood=$dep='';
$nmerr=$agerr=$pherr=$inser=$gener=$stterr=$emailer=$dterr=$bloer=$deper='';

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
        $pherr='enter your mobile';
    }

    else{
        $ph=pp_pp($_POST['phone']);
    }

    
    $ins=pp_pp($_POST['insid']);
    if(empty( $ins=pp_pp($_POST['insid']))){
        $inser='insurance id';
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

      
    $email=pp_pp($_POST['mail']);
    if($email==''){
        $emailer='enter mail';
    }
    else{
        $email=pp_pp($_POST['mail']);
    }

       
    $date=pp_pp($_POST['dt']);
    if($date==''){
        $dterr='enter date';
    }
    else{
        $date=pp_pp($_POST['dt']);
    }

       
    $blood=pp_pp($_POST['blood']);
    if($blood==''){
        $bloer='choose bg';
    }
    else{
        $blood=pp_pp($_POST['blood']);
    }

    $dep=pp_pp($_POST['department']);
    if($dep==''){
        $deper='choose dep';
    }
    else{
        $dep=pp_pp($_POST['department']);
    }










}

function pp_pp($data){
    $data=stripslashes($data);
    $data=trim($data);
    $data=htmlspecialchars($data);
    return $data;
}

$sql=$conn->prepare('INSERT INTO patients(names,age,mobile,insid,gender,states,email,dates,bloodgroup,department) VALUES(?,?,?,?,?,?,?,?,?,?)');

$sql->bind_param("sissssssss",$name,$age,$ph,$ins,$gen,$state,$email,$date,$blood,$dep);
if($name==''|| $age==''|| $ph=='' || $ins=='' || $gen==''||$state=='' || $email==''|| $date=='' || $blood=='' || $dep==''){
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

<div class="heading"><h1>PATIENT ENROLLMENT FORM</h1></div>







<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='post'>

<input type="text" name='name' class="inpt" placeholder="enter your name"> <p class='err'><?php  echo $nmerr;?></p> <br>
<input type="text" name='age' class="inpt" placeholder="enter your age">  <p class='err' id="ager"><?php  echo $agerr;?></p>  <br>
<input type="text" name='phone' class="inpt" placeholder="enter your mobile"> <p class='err'><?php  echo $pherr;?></p><br>


<input type="text" class="inpt" placeholder="enter your insurance id" name="insid">  <p class='err'><?php  echo $inser;?></p> <br>

<select name="gender" id="sl" class="inpts">
<option value="">Gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Transgender">Transgender</option>

</select> <p class='err'><?php  echo $gener;?></p> <br> 
<input type="submit" value='Enroll Now ' class="sbmt"> <br>
<div class="bdv"><a href="cl.php">Patients List</a></div>

</div> 





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

   
</select> <p class='err' id="ssia"><?php  echo $stterr;?></p> <br>

<input type="email" name="mail" class="inpt" placeholder="enter your email"> <p class='err' id="ssia"><?php  echo $emailer;?></p> <br>


<input type="text" placeholder="Date of enrollment" id="datepicker" class="inpt" name="dt"> <p class='err' id="ssia"><?php  echo $dterr;?></p><br>

<select name="blood" id="bbx" class="inpts">
    <option value="">Blood Group</option>
    <option value="O-ve">O-ve</option>
    <option value="A+ve">A+ve</option>
    <option value="A-ve">A-ve</option>
    <option value="B+ve">B+ve</option>
    <option value="B-ve">B-ve</option>
    <option value="AB+ve">AB+ve</option>
    <option value="AB-ve">AB-ve</option>
    <option value="Bombay Blood Group">Bombay Blood Group</option>
    <option value="Rh-null">Rh-null</option>
    <option value="hh (Bombay Phenotype)">hh (Bombay Phenotype)</option>
    <option value="Lu(a+b-)">Lu(a+b-)</option>
    <option value="Lu(a-b+)">Lu(a-b+)</option>
    <option value="Kp(a+b-)">Kp(a+b-)</option>
    <option value="Kp(a-b+)">Kp(a-b+)</option>
    <option value="Js(a+b-)">Js(a+b-)</option>
    <option value="Js(a-b+)">Js(a-b+)</option>
    <option value="Diego Blood Group">Diego Blood Group</option>
    <option value="Duffy Blood Group">Duffy Blood Group</option>
    <option value="Kidd Blood Group">Kidd Blood Group</option>
    <option value="MNS Blood Group">MNS Blood Group</option>
    <option value="Colton Blood Group">Colton Blood Group</option>
    <option value="Cartwright Blood Group">Cartwright Blood Group</option>
    <option value="LW Blood Group">LW Blood Group</option>
    <option value="Lutheran Blood Group">Lutheran Blood Group</option>

   

</select> <p class='err' id="ssia"><?php  echo $bloer;?></p><br> 
<select name="department" id="department" class="inpts">
    <option value="">Choose Department for Consultation</option>
    <option value="Cardiology">Cardiology</option>
    <option value="Dermatology">Dermatology</option>
    <option value="Neurology">Neurology</option>
    <option value="Orthopedics">Orthopedics</option>
    <option value="Pediatrics">Pediatrics</option>
    <option value="Gastroenterology">Gastroenterology</option>
    <option value="Psychiatry">Psychiatry</option>
    <option value="Radiology">Radiology</option>
    <option value="Endocrinology">Endocrinology</option>
    <option value="Oncology">Oncology</option>
    <option value="Urology">Urology</option>
    <option value="Nephrology">Nephrology</option>
    <option value="ENT">ENT (Ear, Nose, Throat)</option>
    <option value="Obstetrics & Gynecology">Obstetrics & Gynecology</option>
    <option value="General Surgery">General Surgery</option>
    <option value="Anesthesiology">Anesthesiology</option>
    <option value="Emergency Medicine">Emergency Medicine</option>
    <option value="Internal Medicine">Internal Medicine</option>
    <option value="Rheumatology">Rheumatology</option>
    <option value="Hematology">Hematology</option>
    <option value="Allergy & Immunology">Allergy & Immunology</option>
    <option value="Infectious Disease">Infectious Disease</option>
    <option value="Plastic Surgery">Plastic Surgery</option>
    <option value="Thoracic Surgery">Thoracic Surgery</option>
    <option value="Vascular Surgery">Vascular Surgery</option>
    <option value="Geriatrics">Geriatrics</option>
    <option value="Palliative Care">Palliative Care</option>
    <option value="Neonatology">Neonatology</option>
    <option value="Hepatology">Hepatology</option>
    <option value="Obstetrics">Obstetrics</option>
    <option value="Gynecology">Gynecology</option>
    <option value="Rehabilitation Medicine">Rehabilitation Medicine</option>
    <option value="Sports Medicine">Sports Medicine</option>
    <option value="Pathology">Pathology</option>
    <option value="Forensic Medicine">Forensic Medicine</option>
    <option value="Medical Genetics">Medical Genetics</option>
    <option value="Dental">Dental</option>
    <option value="Nutrition & Dietetics">Nutrition & Dietetics</option>
    <option value="Speech Therapy">Speech Therapy</option>
    <option value="Optometry">Optometry</option>
    <option value="Audiology">Audiology</option>
    <option value="Chiropractic">Chiropractic</option>
    <option value="Ophthalmology">Ophthalmology</option>
    <option value="Pharmacology">Pharmacology</option>
    <option value="Microbiology">Microbiology</option>
    <option value="Biochemistry">Biochemistry</option>
    <option value="Bariatrics">Bariatrics</option>
    <option value="Toxicology">Toxicology</option>
    <option value="Gastrointestinal Surgery">Gastrointestinal Surgery</option>
    <option value="Pediatric Surgery">Pediatric Surgery</option>
    <option value="Cosmetic Surgery">Cosmetic Surgery</option>
    <option value="Maxillofacial Surgery">Maxillofacial Surgery</option>
    <option value="Hand Surgery">Hand Surgery</option>
    <option value="Podiatry">Podiatry</option>
    <option value="Wound Care">Wound Care</option>
</select>  <p class='err' id="ssia"><?php  echo $deper;?></p> <br>









</div>

<!-- <input type="submit" value='submit' class="sbmt">  -->



<!-- <button class="sbt1"><a href='cl.php' class='sd'>STAFF LIST</a></button> -->



<!-- <button onclick='sp()'>click</button> -->


</form>



<!-- 
<div class="bdv"><a href="cl.php">click</a></div>

</div> -->



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

<script>
     document.getElementById("datepicker").addEventListener("focus", function () {
    this.type = "date";
  });

  document.getElementById("datepicker").addEventListener("blur", function () {
    if (!this.value) {
      this.type = "text";
    }
  });
</script>










</body>
</html>