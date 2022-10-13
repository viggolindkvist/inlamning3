<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>

<body>
    <form action="login.php" method="POST" enctype="multipart/form-data">
        <label for="text">Username:</label>
        <input type="text" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" name="password"><br>
        <button type="submit" name="submit" value="submit">Sign in</button>
    </form>
</body>

</html>