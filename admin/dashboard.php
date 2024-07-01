<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../db.php';

// Ambil daftar latihan dari database
$sql = "SELECT * FROM exercises";
$result = $conn->query($sql);
$exercises = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $exercises[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .dashboard-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1000px;
            text-align: center;
        }

        .dashboard-container h2 {
            margin-top: 0;
            color: #333;
        }

        .btn {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f4f4f4;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .actions a {
            margin-right: 10px;
            color: #007bff;
            text-decoration: none;
        }

        .actions a:hover {
            text-decoration: underline;
        }

        .exercise-image {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <h2>Welcome, Admin!</h2>
        <a href="add_exercise.php" class="btn">Add Exercise</a>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>BMI Category</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($exercises as $exercise) : ?>
                    <tr>
                        <td><?php echo $exercise['name']; ?></td>
                        <td><?php echo $exercise['description']; ?></td>
                        <td><?php echo $exercise['bmi_category']; ?></td>
                        <td>
                            <?php if ($exercise['image_url']) : ?>
                                <img src="<?php echo $exercise['image_url']; ?>" alt="<?php echo $exercise['name']; ?>" class="exercise-image">
                            <?php else : ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td class="actions">
                            <a href="delete_exercise.php?id=<?php echo $exercise['id']; ?>" onclick="return confirm('Are you sure you want to delete this exercise?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>

</html>
