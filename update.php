<?php
require "./config.php";
if (!isset($_GET['id'])||empty($_GET['id']))
{
    die("Id is required");
}

$id=$_GET['id'];

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $name=$_POST['Name'];
    $address = $_POST['Address'];
    $salary = $_POST['Salary'];

    $sql="UPDATE employees
    SET name=:name , Address=:address, Salary=:salary
    WHERE id=:id";
 $stmt = $pdo->prepare($sql);

try {
        $stmt->execute([
            ':name' => $name,
            ':address' => $address,
            ':salary' => $salary,
            ':id' => $id
        ]);

        header("Location: index.php");
        exit();

    } catch (PDOException $e) {
        echo "Error updating data: " . $e->getMessage();
    }
}

    $sql="SELECT *FROM employees WHERE id=:id";

    $stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$employee = $stmt->fetch();

if (!$employee) {
    die("Employee not found");
}

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="post" action="">
    <label>Name:</label>
    <input type="text" name="Name" value="<?= $employee['Name']; ?>" required><br><br>

    <label>Address:</label>
    <input type="text" name="Address" value="<?= $employee['Address']; ?>" required><br><br>

    <label>Salary:</label>
    <input type="number" name="Salary" value="<?= $employee['Salary']; ?>" required><br><br>

    <input type="submit" value="Update">
</form>

<a href="index.php">Back to Employees List</a>

</body>
</html>