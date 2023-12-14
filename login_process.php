<?php
require_once('db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT id, name, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($user_id, $name, $hashed_password);

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        session_start();
        $_SESSION['user_id'] = $user_id;
        $_SESSION['name'] = $name;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid email or password";
    }

    $stmt->close();
    $conn->close();
}
?>
