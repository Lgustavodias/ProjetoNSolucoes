 <!-- Barra Lateral -->
 <div class="sidebar" id="sidebar">
    <?php if($nivel_usuario=="admin"){ ?>
        <ul>
            <li><a href="../home/index.php" class="sidebar-link">Início</a></li>
            <li><a href="../home/cadastro_usuario.php" class="sidebar-link">Cadastro de Usuarios</a></li>
            <li><a href="../home/cadastro_produto.php" class="sidebar-link">Cadastro de Produtos</a></li>
        </ul>
        <?php } else{}?> 
    </div>

    