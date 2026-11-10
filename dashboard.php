<?php include 'config.php'; require_login(); ?> 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Dashboard</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 
    <div class="container"> 
        <div class="header-bar"> 
            <h2> Welcome</h2>  
<?php echo $_SESSION['fullname']; ?> 
            <div class="nav-links"> 
                <?php if ($_SESSION['role'] === 'admin'): ?> 
                    <a href="users.php">Manage Users</a> 
                <?php endif; ?> 
                <a href="logout.php" class="btn btn-sm btn-danger">Logout</a> 
            </div> 
        </div> 
         
        <div style="background: #f7fafc; padding: 20px; border-radius: 6px;"> 
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p> 
            <p><strong>Role:</strong> <?php echo ucfirst($_SESSION['role']); ?></p> 
            <p style="margin-top: 10px;">You are logged in successfully!</p> 
        </div> 
    </div> 
</body> 
</html> 
 
 
