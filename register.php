<?php include 'config.php'; ?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Register</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="container" style="max-width: 450px; margin-top: 50px;"> 
        <h2> Create an Account</h2> 
        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            $fullname = trim($_POST['fullname']); 
            $email = trim($_POST['email']); 
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
 
            $check = mysqli_query($conn, "SELECT id FROM users WHERE email='$email'"); 
            if (mysqli_num_rows($check) > 0) { 
                echo "<div class='alert alert-error'>Email already exists!</div>"; 
            } else { 
                $sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', 
'$email', '$password')"; 
                if (mysqli_query($conn, $sql)) { 
                    echo "<div class='alert alert-success'>Registered successfully! <a 
href='login.php'>Login here</a></div>"; 
                } else { 
                    echo "<div class='alert alert-error'>Error: " . mysqli_error($conn) . "</div>"; 
                } 
            } 
        } 
        ?> 
        <form method="POST"> 
            <input type="text" name="fullname" placeholder="Full Name" required> 
            <input type="email" name="email" placeholder="Email Address" required> 
            <input type="password" name="password" placeholder="Password" required> 
            <button type="submit" class="btn btn-primary" style="width:100%">Register</button> 
        </form> 
        <div class="text-center"> 
            Already have an account? <a href="login.php">Sign In</a> 
        </div> 
    </div> 
</body> 
</html> 
