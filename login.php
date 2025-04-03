<?php
include "database.php";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if($stmt->num_rows) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if(password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: #ffffff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 360px;
    text-align: center;
}

h3 {
    color: #e63946;
    margin-bottom: 20px;
}

input[type="text"],
input[type="password"] {
    width: 90%;
    padding: 12px;
    margin-top: 8px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background: #f9f9f9;
    font-size: 14px;
}

button {
    width: 100%;
    padding: 12px;
    background: #e63946;
    color: #ffffff;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #d62839;
}

.message {
    margin-bottom: 15px;
    padding: 12px;
    border-radius: 8px;
    font-size: 14px;
}

.error {
    background: #ffebee;
    color: #c62828;
    border: 1px solid #ef9a9a;
}

p {
    font-size: 14px;
    color: #444;
    margin-top: 15px;
}

a {
    color: #e63946;
    font-weight: bold;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>

<body>
    <div class="container">
        <h3>Login</h3>

        <?php if(!empty($error)) : ?>
            <div class="message error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" placeholder="Enter username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Enter password" id="password" required>

            <button type="submit">Login</button>

            <p>Doesn't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>

</html>