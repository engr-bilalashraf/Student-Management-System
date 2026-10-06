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

        <form method="post" action="login.php">

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