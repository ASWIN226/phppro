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
$name = $age = $ph = '';
$nmerr = $agerr = $pherr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = pp_pp($_POST['name']);
    if (empty($name)) {
        $nmerr = 'Enter your name';
    }

    $age = pp_pp($_POST['age']);
    if (empty($age)) {
        $agerr = 'Enter your age';
    }

    $ph = pp_pp($_POST['phone']);
    if (empty($ph)) {
        $pherr = 'Enter your phone number';
    }

    // Only proceed if there are no errors
    if ($name !== '' && $age !== '' && $ph !== '') {
        $sql = $conn->prepare('INSERT INTO patients(names, age, mobile) VALUES (?, ?, ?)');
        $sql->bind_param("sis", $name, $age, $ph);

        // Execute and check for errors
        if ($sql->execute()) {
            echo "Record inserted successfully.";
        } else {
            echo "Error: " . $sql->error;
        }

        $sql->close();
    }
}

function pp_pp($data) {
    $data = stripslashes($data);
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
}

$conn->close();
?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
    <input type="text" name="name" placeholder="Name"> 
    <p class="err"><?php echo $nmerr; ?></p> <br>

    <input type="text" name="age" placeholder="Age">  
    <p class="err"><?php echo $agerr; ?></p> <br>

    <input type="text" name="phone" placeholder="Phone Number">  
    <p class="err"><?php echo $pherr; ?></p> <br>

    <input type="submit" value="Submit">
</form>

<?php
// Optional: Display entered phone number
if (!empty($ph)) {
    echo "Phone Number: " . $ph;
}
?>

</body>
</html>
