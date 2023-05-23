<?php
    require_once 'cookie.php';
    require_once'./Session.php';

    $session = new Session();
    $session->startSession();
    if((!$session->exist())){
        header('location:./../index.php');
    }
    $logado = $session->getUsername();

    $teste = $_COOKIE['usuario'];
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Oi</title>
    </head>

    <body>
        <table width="800" height="748" border="1">
        <tr>
            <td height="90" colspan="2" bgcolor="#CCCCCC">SISTEMA WEB TESTE
            <?php
                echo"Bem vindo " . $logado . "<br/>";
                echo $teste . "<br/>";
            ?>
            </td>
        </tr>
        <tr>
            <td width="103" height="410" bgcolor="#CCCCCC">MENU AQUI</td>
            <td width="546">CONTEUDO E ICONES AQUI</td>
        </tr>
        <tr>
            <td colspan="2" bgcolor="#000000"> </td>
        </tr>
        </table>
    </body>
</html>