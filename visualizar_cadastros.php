<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cadastro";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete']; 
    $conn->query("DELETE FROM usuarios WHERE id = $id");
    header("Location: visualizar_cadastros.php"); 
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 
    $column = $_POST['column']; 
    $value = $_POST['value']; 


    $sql = "UPDATE usuarios SET ".$column."='".$conn->real_escape_string($value)."' WHERE id=".$id;
    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso.";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }
    exit;
}

$sql = "SELECT id, nome, email FROM usuario";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visualizar Cadastros</title>
    <link rel="stylesheet" type="text/css" href="cadastroo.css">
    <script>
    function enableEditing(id) {
        var nameCell = document.getElementById('name-' + id);
        var emailCell = document.getElementById('email-' + id);
        nameCell.contentEditable = true;
        emailCell.contentEditable = true;
        nameCell.focus();
    }

   
    function updateData(element, column, id) {
        var value = element.innerText;
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "visualizar_cadastros.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("value=" + value + "&column=" + column + "&id=" + id);
    }

 
    function deleteRow(id) {
        var confirmDelete = confirm("Tem certeza que deseja excluir este registro?");
        if (confirmDelete) {
            window.location.href = 'visualizar_cadastros.php?delete=' + id;
        }
    }
    </script>
</head>
<body>

<div class="aux">

<div class="card">
<div class="logo-imagem">
            <img src="imagem/logo-removebg-preview.png">
    <h1>Visualizar Cadastros</h1>
</div>

    <?php

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Nome</th><th>Email</th><th>Ações</th></tr>";
       
        while($row = $result->fetch_assoc()) {
        
            echo "<tr><td id='name-" . $row["id"] . "' onBlur='updateData(this, \"nome\", ".$row["id"].")'>" . $row["nome"]. "</td><td id='email-" . $row["id"] . "' onBlur='updateData(this, \"email\", ".$row["id"].")'>" . $row["email"]. "</td><td>";
            echo "<button onClick='enableEditing(".$row["id"].")'>✏️</button> ";
            echo "<button onClick='deleteRow(".$row["id"].")'>🗑️</button>";
            echo "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Ainda não há cadastro...";
    }
    ?>

    <a href="cadastro.php" class="btn-retorno">Voltar ao Cadastro</a>
</div>
</div>
</body>
</html>