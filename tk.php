<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>

<?php

$o=$t='';

$a='hello';
if($a==(!intval($a))){
    $o='sorry';
}

else{
    $t='yeah';
}



?>

<h1 class="o"><?php echo $o;     ?></h1> 

<h1 class="t"><?php echo $t;    ?></h1>    
</body>
</html>