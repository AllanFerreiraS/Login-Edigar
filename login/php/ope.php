<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type='text/javascript' src='./../js/errorFunctions.js'></script>
</head>
<body>
    <?php
        require_once'Login.php';
        require_once'Session.php';

        $l = $_POST['usuario'];
        $s = $_POST['senha'];
        $login = new LoginUser();
        $login->setUser_pass($l, $s);
        if($login->existLogin()) {
            $session = new Session();
            $session->createSession($l, $s);
            header('location:main.php');
        }
        else {
            echo "<script>loginIncorrect()</script>";
        }
    ?>
</body>
</html>
