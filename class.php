<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    class animals{
        public $name;
        public $color;
        public function __construct($name,$color) {
            $this->name=$name;
            $this->color=$color;
        }

        function display(){
            echo 'this is a'. ' '.$this->color .' '. "color".' ';
            echo $this->name;
        }



    }

    $obj=new animals('cat','black');
    $obj->display();
    echo "<br>";

    
    $obj=new animals('Dog','white');
    $obj->display();

    echo "<br>";

    
    $obj=new animals('Deer','Brown');
    $obj->display();



    




?>


<?php

for($a=10;$a<=22;$a++){
    echo $a;
    echo '<br>';
}




?>
    
</body>
</html>