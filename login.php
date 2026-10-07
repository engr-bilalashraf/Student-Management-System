
<?php 

session_start();

require_once "db/db.php"; 

$error = ""; 

if ($_SERVER["REQUEST_METHOD"] === "POST") 
{ 

$username = trim($_POST["username"]); 
$password = $_POST["password"]; 

if (empty($username) || empty($password)) 
{ 

$error = "Username and password are required."; 

} 
else 
{ 

$sql = "SELECT id, username, password FROM users WHERE username = ?"; 
$stmt = mysqli_prepare($conn, $sql); 
mysqli_stmt_bind_param($stmt, "s", $username); mysqli_stmt_execute($stmt); 
$result = mysqli_stmt_get_result($stmt); 

if (mysqli_num_rows($result) === 1) 
{ 
$user = mysqli_fetch_assoc($result); 
if (password_verify($password, $user["password"])) 
{ 

$_SESSION["user_id"] = $user["id"]; 
$_SESSION["username"] = $user["username"]; 

header("Location: dashboard.php"); 
exit(); 
} 
else 
{ 
$error = "Invalid username or password."; 
}
} 
else 
{ 
$error = "Invalid username or password."; 
} 
mysqli_stmt_close($stmt); 
} 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
    
<body>

    <div class="login-card">

        <div class="login-header">
            <h1>Welcome Back</h1>
            <p>Sign in to Student Management System</p>
        </div>

         <?php if (!empty($error)): ?> <p style="color: red;"> <?php echo htmlspecialchars($error); ?> </p> <?php endif; ?>

        <form method="POST" action="">

            <div class="field">
                <label for="username">Username or Email</label>
                <input type="text" id="username" name="username"
                       placeholder="Enter your username or email"
                       autocomplete="username" required>
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password"
                       placeholder="Enter your password"
                       autocomplete="current-password" required>
            </div>

            <div class="options">
                <label class="remember">
                    <input type="checkbox" name="remember">
                    Remember me on this device
                </label>
            </div>

            <button type="submit">Login</button>

            <p class="forgot">
                Forgot your password?
                <a href="#">Click here to reset it.</a>
            </p>

        </form>

    </div>

</body>
</html>
