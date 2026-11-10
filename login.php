<?php 
include 'config.php'; 
$error = ""; 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $email = trim($_POST['email']); 
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'"); 
    $user = mysqli_fetch_assoc($result); 
 
    if ($user && password_verify($_POST['password'], $user['password'])) { 
        $_SESSION['user_id'] = $user['id']; 
        $_SESSION['fullname'] = $user['fullname']; 
        $_SESSION['email'] = $user['email']; 
        $_SESSION['role'] = $user['role']; 
        header("Location: dashboard.php"); 
        exit; 
    } else { 
        $error = "Invalid email or password!"; 
    } 
} 
?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Sign In</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="container" style="max-width: 450px; margin-top: 50px;"> 
        <h2> Sign In</h2> 
        <?php if ($error) echo "<div class='alert alert-error'>$error</div>"; ?> 
        <form method="POST"> 
            <input type="email" name="email" placeholder="Email Address" required> 
            <input type="password" name="password" placeholder="Password" required> 
            <button type="submit" class="btn btn-primary" style="width:100%">Login</button> 
        </form> 
        <div class="text-center"> 
            Don't have an account? <a href="register.php">Create one</a> 
        </div> 
    </div> 
</body> 
</html> 
