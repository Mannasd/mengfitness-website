<!DOCTYPE html>
<html lang="en">
<?php
include '../db.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Exercise - Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .dashboard-container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            width: calc(100% - 18px);
        }
        button[type="submit"],
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        button[type="submit"]:hover,
        .btn:hover {
            background-color: #45a049;
        }
        .btn {
            background-color: #007bff;
            margin-left: 10px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        img {
            max-width: 200px;
            margin-top: 10px;
            display: block;
        }
    </style>
</head>

<body>
    <div class="dashboard-container">
        <h2>Edit Exercise</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($exercise['name']); ?>" required><br>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($exercise['description']); ?></textarea><br>
            <label for="bmi_category">BMI Category:</label>
            <select id="bmi_category" name="bmi_category" required>
                <option value="underweight" <?php if ($exercise['bmi_category'] == 'underweight') echo 'selected'; ?>>Underweight</option>
                <option value="normal" <?php if ($exercise['bmi_category'] == 'normal') echo 'selected'; ?>>Normal</option>
                <option value="overweight" <?php if ($exercise['bmi_category'] == 'overweight') echo 'selected'; ?>>Overweight</option>
                <option value="obese" <?php if ($exercise['bmi_category'] == 'obese') echo 'selected'; ?>>Obese</option>
            </select><br>
            <label for="image">Upload New Image:</label>
            <input type="file" id="image" name="image" accept="image/*"><br>
            <?php if (!empty($exercise['admin/uploads?image_url'])): ?>
                <img src="../<?php echo htmlspecialchars($exercise['admin/image_url']); ?>" alt="Current Image">
            <?php endif; ?>
            <button type="submit">Save Changes</button>
        </form>
        <a href="dashboard.php" class="btn">Back to Dashboard</a>
    </div>
</body>

</html>
