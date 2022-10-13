
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="form.php"><-Return</a>

    <?php
    $user_name = 'Viggo';
    $user_password = "1996";

    if(isset($_POST['submit'])) {
        $loginName = $_POST['username'];
        $loginPassword = $_POST['password'];
        if ($loginName == $user_name && $user_password == $loginPassword) {
            Session_Start();
            $_SESSION['user_name'] = $loginName;
            //echo "Success, you're now logged in to your account ";
            //echo $_SESSION['user_name'];
            header("location:fileUpload.php?uploadsuccess"); 
        } else {
            echo "Wrong Username or Password";
        }
    } 

    
    ?>

</body>

</html>