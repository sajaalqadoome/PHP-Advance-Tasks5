<?php
require "./config.php";
if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['empname'];
    $address=$_POST['Address'];
    $salary=$_POST['Salary'];

    $sql="INSERT INTO employees(Name,Address,Salary)VALUES(:name, :address, :salary)";
    $stmt=$pdo->prepare($sql);

     try {
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            ':salary' => $salary
        ]);
        
        header("Location: index.php");
        exit();
    } catch (PDOException $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Emplpyee</title>
</head>

<body>
   <h2>Create Employee</h2>
   <form action="" method="post">
<label>Name emp</label>
<input type="text" id="empname" name="empname" required><br><br>
<label>  Address emp</label>
<input type="text" id="Address" name="Address" required><br><br>
<label>Salary emp</label>
<input type="text" id="Salary" name="Salary" required><br><br>
     
        <input type="submit" value="Submit">
   </form> 
</body>
</html>

