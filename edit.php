<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM patients WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $insid = $_POST['insid'];
    $gender = $_POST['gender'];
    $state = $_POST['state'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $bloodgroup = $_POST['bloodgroup'];
    $department = $_POST['department'];

    $sql = "UPDATE patients SET names = ?, age = ?, mobile = ?, insid = ?, gender = ?, states = ?, email = ?, dates = ?, bloodgroup = ?, department = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sissssssssi", $name, $age, $mobile, $insid, $gender, $state, $email, $date, $bloodgroup, $department, $id);
    
    if ($stmt->execute()) {
        header("Location: cl.php");
        exit;
    } else {
        echo "Error updating record.";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Patient</title>
    <link rel="stylesheet" href="edit.css">
</head>
<body>
    <div class="overlay"></div>
    <div class="main">
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="name" value="<?php echo $row['names']; ?>" class="inpt">
        <input type="number" name="age" value="<?php echo $row['age']; ?>" class="inpt"><br>
        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" class="inpt">
        <input type="text" name="insid" value="<?php echo $row['insid']; ?>" class="inpt"> <br>

        
         <input type="text" name="gender" value="<?php echo $row['gender']; ?>" class="inpt">
     



         <input type="text" name="state" value="<?php echo $row['states']; ?>" class="inpt"> <br>
          
        <input type="email" name="email" value="<?php echo $row['email']; ?>" class="inpt">

         <input type="date" name="date" value="<?php echo $row['dates']; ?>" class="inpt"><br>


         <input type="text" name="bloodgroup" value="<?php echo $row['bloodgroup']; ?>" class="inpt">

        <input type="text" name="department" value="<?php echo $row['department']; ?>" class="inpt"><br>

        <button type="submit" class="submit">Update</button>
    </form>

    </div>
   
</body>
</html>
