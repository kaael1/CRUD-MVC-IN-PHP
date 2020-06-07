<?php include 'inc/header.php'; ?>

        <h2>Projeto</h2>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input disabled type="text" class="form-control" name="nome"  value="<?=$projeto->nome?>" >
        </div>

        <div class="form-group">
            <label for="duracao">Duração:</label>
            <input disabled type="text" class="form-control" name="duracao" value="<?=$projeto->duracao?>" >
        </div>

<?php include 'inc/footer.php'; ?>