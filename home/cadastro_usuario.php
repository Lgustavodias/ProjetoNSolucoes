<?php
require_once("../generics/config.php");
require_once("../generics/topbar.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto N Soluções</title>
    <link rel="stylesheet" type="text/css" href="../css/sidetopbar.css">
    <link rel="stylesheet" type="text/css" href="../css/cadastro_usuario.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>

<body>
    <?php
    require_once("../generics/sidebar.php");
    ?>
    <!-- Tabela de listagem de usuários -->
<div style="text-align: center;">
    <h1>Listagem de Usuários</h1>
</div>
<div class="table-container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <!-- Tabela de listagem de usuários -->
    <table id="listar_usuario" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Nível</th>
                <th>CPF</th>
                <th>Nascimento</th>
                <th>Endereço</th>
                <th>CEP</th>
            </tr>
        </thead>
    </table>
</div>
    <div class="form-container">
        <!-- Modal -->
        <div class="modal" id="myModal">
            <div class="modal-content">
                <form action="../home/cadastrou_usuario.php" method="POST">
                    <label for="name">Nome:</label>
                    <input type="text" id="name" name="name" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="password">Senha:</label>
                    <input type="password" id="password" name="password" required><br><br>

                    <label for="level">Nível:</label>
                    <select id="level" name="level" onchange="showAdminFields()">
                        <option value="admin">Admin</option>
                        <option value="cliente">Cliente</option>
                    </select><br><br>

                    <div id="adminFields" style="display:none;">
                        <label for="cpf">Cpf</label>
                        <input type="text" id="cpf" name="cpf"><br><br>

                        <label for="birthdate">Data de Nascimento:</label>
                        <input type="date" id="birthdate" name="birthdate"><br><br>


                        <label for="endereco">Endereço</label>
                        <input type="text" id="endereco" name="endereco"><br><br>

                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep"><br><br>
                    </div>
                    <button id="closeModalButton">Fechar</button>
                    <button type="submit" id="submitButton">Enviar</button>
                </form>
                </div>
        </div>
    </div>

    <!-- Botão para abrir o modal -->
    <button id="openModalButton">Cadastrar Usuario/Cliente</button>
    <?php
    include_once("../generics/footer.php");
    ?>

    <!-- Scripts -->
    <script src="../js/sidebar.js"></script>
    <script src="../js/cadastro_usuario.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
       new DataTable('#listar_usuario', {
    ajax: '../home/listar_usuarios.php',
    processing: true,
    serverSide: true,
    searching: false, // Desabilita a pesquisa
    paging: true, // Habilita a paginação
    lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]], // Opções de quantidade de registros por página
});
    </script>
</body>

</html>