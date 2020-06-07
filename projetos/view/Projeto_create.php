<?php include 'inc/header.php'; ?>



    <form action="" method="post">

        <h2>Projeto</h2>

        <?php
        // exibe a mensagem de erro quando ela existir
        if ( isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome"  value="" required>
        </div>

        <div class="form-group">
            <label for="duracao">Duração:</label>
            <input type="date" class="form-control" name="duracao" value="" required>
        </div>

        <button type="submit">Salvar</button>

    </form>

<?php include 'inc/footer.php'; ?>