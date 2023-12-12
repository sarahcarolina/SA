<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Listar Usuários </title>
</head>

<style>

    table td{
        border: 1px solid black;
        text-align: center;
    }

    table{
        border: 1px solid black;
    }
    

</style>


<body style="font-family:Verdana">
    
    <h1 align=center> Listar usuários cadastrados</h1>

    <table align=center>
        <tr>
            <td> ID </td>
            <td> NOME </td>
            <td> E-MAIL </td>
            <td> CPF </td>
            <td> SENHA </td>
        </tr>

        <?php

            include_once '../dao/usuarioDao.php';

            $userDao = new UsuarioDao();

        ?>
          
          <?php foreach ($userDao->listar() as $user) : ?>

        <tr>
            <td> <?= $user->getID(); ?></td>
            <td> <?= $user->getNome(); ?></td>
            <td> <?= $user->getEmail(); ?></td>
            <td> <?= $user->getCPF(); ?></td>
            <td> <?= $user->getSenha(); ?></td>
        </tr>

        <?php endforeach ?>
    </table>

</body>
</html>