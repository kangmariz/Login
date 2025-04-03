<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
       body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #ff9a9e, #fad0c4);
    margin: 0;
    padding: 0;
}

.navbar {
    background: #e63946;
    padding: 15px 30px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    color: #fff;
    border-bottom: 3px solid #d62839;
}

.navbar h2 {
    margin: 0;
    font-size: 22px;
}

.logout-btn {
    padding: 10px 16px;
    background: #d62839;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
    transition: 0.3s ease;
}

.logout-btn:hover {
    background: #b71c1c;
}

.container {
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    margin: 60px auto;
    text-align: center;
}

h3 {
    margin-bottom: 20px;
    color: #e63946;
    font-size: 24px;
}

p {
    margin-bottom: 20px;
    color: #444;
    font-size: 16px;
}

    </style>
</head>

<body>

    <div class="navbar">
        <h2>Dashboard</h2>
        <a href="logout.php" class="logout-btn">Logout</a>
    </div>

    <div class="container">
        <h3>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h3>
        <p>You have successfully logged in.</p>
    </div>

</body>

</html>