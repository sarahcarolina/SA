<?php
session_start(); // Inicia a sessão PHP, o que é necessário para utilizar variáveis de sessão.

$erro = ""; // Inicializa a variável de erro como uma string vazia.

// Verifica se o método de requisição é POST, o que normalmente indica que o formulário foi enviado.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos nome, email ou senha estão vazios.
    if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])) {
        $erro = "Por favor, preencha todos os campos."; // Define a mensagem de erro se algum campo estiver vazio.
    } else {
        require_once "processa_cadastro.php"; // Inclui o arquivo que processa o cadastro se todos os campos estiverem preenchidos.
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="cadastroo.css"> <!-- Link para o arquivo CSS externo -->
    <title>Cadastro</title>
</head>

<body>

    <section class="box">
        <div class="logo-img">
            <img src="imagem/logo-removebg-preview.png" id="imagem">
            <h1>Cadastro de Usuário</h1>
        </div>
        <!-- Formulário de cadastro. O action está configurado para enviar os dados para a mesma página. -->
        <div id="wrapper-box">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- Campos de nome, e-mail e senha -->

                <div class="container-input">
                    <label for="nome">Nome:</label>
                    <input class="box-input" type="text" id="nome" name="nome" required>
                </div>


                <div class="container-input">
                    <label>Data de <br> nascimento:</label>
                    <td><input class="box-input" type="date" id="data_nasc" name="data_nasc" required></td>
                </div>


                <div class="container-input">
                    <td><label for="email">E-mail:</label></td>
                    <td><input class="box-input" type="email" id="email" name="email" required></td>
                </div>


                <div class="container-input">
                    <td><label for="senha">Senha:</label></td>
                    <td><input class="box-input" type="password" id="senha" name="senha" required></td>
                </div>


                <div class="container-input">
                    <label>CPF:</label>
                    <input class="box-input" type="number" id="cpf" name="cpf"
                        placeholder="Digite seu CPF (Somente números)." max="99999999999" size="30" required>
                </div>

                <div class="container-input">
                    <label>Sexo:</label>
                    <div>
                        <input type="radio" id="sexo" name="sexo" value="M" required><label>Masculino</label><br>
                        <input type="radio" id="sexo" name="sexo" value="F" required><label>Feminino</label>
                    </div>
                </div>

                <div class="container-input">
                    <label>Estado:</label>

                    <select class="box-input" name="estado" id="estado" required>
                        <option value="default" selected="selected">--Selecione--</option>
                        <option value="AC">AC</option>
                        <option value="AL">AL</option>
                        <option value="AM">AM</option>
                        <option value="AP">AP</option>
                        <option value="CE">DF</option>
                        <option value="ES">ES</option>
                        <option value="GO">GO</option>
                        <option value="MA">MA</option>
                        <option value="MT">MT</option>
                        <option value="MS">MS</option>
                        <option value="MG">MG</option>
                        <option value="PA">PA</option>
                        <option value="PB">PB</option>
                        <option value="PR">PR</option>
                        <option value="PE">PE</option>
                        <option value="PI">PI</option>
                        <option value="RJ">RJ</option>
                        <option value="RN">RN</option>
                        <option value="RS">RS</option>
                        <option value="RO">RO</option>
                        <option value="RR">RR</option>
                        <option value="SC">SC</option>
                        <option value="SP">SP</option>
                        <option value="SE">SE</option>
                        <option value="TO">TO</option>
                    </select>
                </div>

                <div class="container-input">
                    <label>CEP:</label>
                    <input class="box-input" type="number" id="cep" name="cep" placeholder="Digite seu CEP." required>
                </div>

                <div class="container-input">
                    <label>Endereço:</label>
                    <input class="box-input" type="text" id="endereco" name="endereco"
                        placeholder="Digite seu endereço:" required>
                </div>

                <div class="container-input">
                    <label>Telefone:</label>
                    <input class="box-input" type="number" size="20" id="telefone" name="telefone"
                        placeholder="(DDD) 99999-9999" max="99 999999999">
                </div>

                <div class="btn-view"><button type="submit" value="Cadastrar">Cadastrar</button></div><!-- Botão de envio do formulário -->
            </form>
        <!-- Link para visualizar cadastros -->
        <a href="visualizar_cadastros.php" class="btn-view">Visualizar Cadastros</a>

        <?php
        // Verifica se há uma mensagem de erro para exibir.
        if (!empty($erro)): ?>
            <div class="mensagem erro">
                <?php echo $erro; // Exibe a mensagem de erro ?>
            </div>
        <?php
            // Verifica se existe uma mensagem na sessão e se ela não está vazia.
        elseif (isset($_SESSION['mensagem']) && !empty($_SESSION['mensagem'])): ?>
            <div class="mensagem">
                <?php
                echo $_SESSION['mensagem']; // Exibe a mensagem da sessão.
                unset($_SESSION['mensagem']); // Limpa a mensagem da sessão.
                ?>
            </div>

        <?php endif; ?>
        
    </div>

</body>

</html>