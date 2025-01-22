<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-List</title>
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/reset.css">
    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

    <div class="__formContainer">
                <div class="logo"></div>
                <form id="login-form" method="POST" action="login.php">
                    <header>
                        <h2>Hello Again</h2>
                        <p>Not a member? <a href="./signup">Register now</a></p>
                        <small>Enter your credentials to access your account</small>
                </p>
            </header>
            <div class="form-group">
                <label for="username">Email</label>
                <input type="email" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <button type="submit" name="login">Log In <i class="bi bi-chevron-right"></i></button>
            </div>
        </form>
    </div>

</body>

</html>