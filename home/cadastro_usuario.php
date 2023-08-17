<?php
require_once("../generics/config.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto N Soluções</title>
    <link rel="stylesheet" type="text/css" href="../css/sidetopbar.css">
    <link rel="stylesheet" type="text/css" href="../css/formulario.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <?php
    require_once("../generics/sidebar.php");
    require_once("../generics/topbar.php");
    ?>
    <div class="content" align:center>
        <button id="openModalButton">Cadastrar Usuario/Cliente</button>
        <div class="form-container">
            <!-- Modal -->
            <div class="modal" id="myModal">
                <div class="modal-content">
                    <form>
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
                            <label for="field1">Cpf</label>
                            <input type="text" id="field1" name="field1"><br><br>

                            <label for="birthdate">Data de Nascimento:</label>
                            <input type="date" id="birthdate" name="birthdate"><br><br>


                            <label for="field3">Endereço</label>
                            <input type="text" id="field3" name="field3"><br><br>

                            <label for="field4">CEP</label>
                            <input type="text" id="field4" name="field4"><br><br>
                        </div>
                        <button id="closeModalButton">Fechar</button>
                        <button type="submit" id="submitButton">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="table-container">
            <div class="table-responsive">
                <table class="table table-striped table-hover" id="mytable">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Nível</th>
                            <th>CPF</th>
                            <th>Nascimento</th>
                            <th>Endereço</th>
                            <th>CEP</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Query para popular atabela consultando dabase de dados -->
                        <?php
                        $query = $pdo->prepare("SELECT * FROM projeto_n_solucoes.usuarios");
                        $query->execute();
                        $resultados = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($resultados as $row) { ?>
                            <tr>
                                <td><?php echo $row["nome"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>
                                <td><?php echo $row["nivel"]; ?></td>
                                <td><?php echo $row["cpf"]; ?></td>
                                <td><?php echo $row["data_nascimento"]; ?></td>
                                <td><?php echo $row["endereco"]; ?></td>
                                <td><?php echo $row["cep"]; ?></td>
                                <td align="center">
                                    <button  title="apagar usuario" data-usuario="<?php echo $id_get; ?>" data-produto="<?php echo $row["id"]; ?>">
                                    <i class="bi-alarm"></i>
                                    </button>
                                </td>
                                <td align="center">
                                    <button title="Editar usuario" data-usuario="<?php echo $id_get; ?>" data-produto="<?php echo $row["id"]; ?>">
                                    <i class="bi-alarm"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="page-wrapper">
        <?php
        include_once("../generics/footer.php");
        ?>
    </div>
    <script src="../js/sidebar.js"></script>
    <script src="../js/formulario.js"></script>

</body>

</html>