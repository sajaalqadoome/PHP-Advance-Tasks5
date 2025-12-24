<?php
require_once "config.php";

$stmt = $pdo->prepare("SELECT * FROM employees");
$stmt->execute();
$employees = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Segoe UI", Tahoma, sans-serif;
}

body {
    background: #f7f7f7;
    padding: 40px;
}

.container {
    background: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}

.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
}

.header h2 {
    color: #d9773a;
    font-size: 26px;
}

.add-btn {
    background: #e3a37a;
    color: #fff;
    padding: 10px 18px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    transition: 0.3s;
}

.add-btn:hover {
    background: #d0895f;
}

table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #fff5ee;
}

th, td {
    padding: 14px;
    text-align: left;
}

th {
    color: #d9773a;
    font-weight: 600;
    border-bottom: 2px solid #f2e1d6;
}

tbody tr {
    border-bottom: 1px solid #f2e1d6;
}

tbody tr:nth-child(odd) {
    background: #fffaf6;
}

tbody tr:hover {
    background: #fff1e6;
}

td.salary {
    font-weight: bold;
    color: #d9773a;
}


.actions a {
    margin-right: 10px;
    color: #d9773a;
    text-decoration: none;
    font-size: 16px;
    transition: 0.2s;
}

.actions a:hover {
    color: #b85f2d;
}

</style> 
<body>

<div class="container">

    <div class="header">
        <h2>Employees</h2>
        <a href="create.php" class="add-btn">+ Add New Employee</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php if(count($employees) > 0): ?>
            <?php foreach($employees as $emp): ?>
                <tr>
                    <td><?= $emp['id']; ?></td>
                    <td><?= $emp['Name']; ?></td>
                    <td><?= $emp['Address']; ?></td>
                    <td class="salary"><?= $emp['Salary']; ?></td>
                    <td class="actions">

                        <a href="read.php?id=<?= $emp['id']; ?>" title="View">
                            <i class="fa-solid fa-eye"></i>
                        </a>

                        <a href="update.php?id=<?= $emp['id']; ?>" title="Edit">
                            <i class="fa-solid fa-pen"></i>
                        </a>

                        <a href="delete.php?id=<?= $emp['id']; ?>"
                           title="Delete"
                           onclick="return confirm('Are you sure you want to delete this employee?');">
                            <i class="fa-solid fa-trash"></i>
                        </a>

                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No records found</td>
            </tr>
        <?php endif; ?>
        </tbody>

    </table>

</div>

</body>

</html>

