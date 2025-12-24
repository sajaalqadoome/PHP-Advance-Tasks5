<?php
require "./config.php";

if(!isset($_GET['id'])||empty($_GET['id']))
{
    die("ID is required");
}

$id=$_GET['id'];
$sql = "SELECT * FROM employees WHERE id = :id";
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
    <h2>Employee Details</h2>

<table>
    <tr>
        <th>ID</th>
        <td><?= $employee['id']; ?></td>
    </tr>
    <tr>
        <th>Name</th>
        <td><?= $employee['Name']; ?></td>
    </tr>
    <tr>
        <th>Address</th>
        <td><?= $employee['Address']; ?></td>
    </tr>
    <tr>
        <th>Salary</th>
        <td><?= $employee['Salary']; ?></td>
    </tr>
</table>

<a href="index.php">Back to Employees</a>
</body>
</html>