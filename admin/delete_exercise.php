<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
include '../db.php';

if (isset($_GET['id'])) {
    $exercise_id = $_GET['id'];
    // Delete exercise from database
    $sql = "DELETE FROM exercises WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $exercise_id);
    $stmt->execute();
    $stmt->close();

    header("Location: dashboard.php");
    exit();
}
