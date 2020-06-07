<?php include 'inc/header.php'; ?>

<h2>Projetos</h2>

<?php
// exibe a mensagem de erro quando ela existir
if ( isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>

<div class="panel panel-default">

    <div class="panel-heading text-right">
        <div class="pull-right"><a class="btn btn-primary" href='?classe=Projeto&acao=create'> <i class="fa fa-plus-circle" style='color:white'></i> Novo </a></div>
    </div>
    <br>
    <br>

    <div class="panel-body">
        <table id="tabela" class="table table-striped table-bordered table-hover" style="width:100%">

            <thead>
            <tr>
                <th>Nome</th>
                <th>Duração</th>
                <th width="300px">Ações</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach($projetos as $projeto){ ?>
                <tr>
                    <td><?=$projeto->nome?></td>
                    <td><?=$projeto->duracao?></td>
                    <td>
                        <a class='btn btn-primary' href='?classe=Projeto&acao=read&id=<?=$projeto->id?>'> <i class="fa fa-eye" style='color:white'></i> Ver</a>
                        <a class='btn btn-primary' href='?classe=Projeto&acao=update&id=<?=$projeto->id?>'> <i class="fa fa-edit" style='color:white'></i> Alterar</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"  data-id="<?=$projeto->id?>"> <i class="fa fa-trash" style='color:white'></i> Excluir</button>
                    </td>
                </tr>
            <?php } ?>
            </tbody>

        </table>
    </div>

</div>

<?php include 'inc/footer.php'; ?>


<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Cabeçalho -->
            <div class="modal-header">
                <h4 class="modal-title">Exclusão de Registro</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Corpo -->
            <div class="modal-body">
                Deseja realmente excluir o registro?
            </div>

            <!-- Rodapé -->
            <div class="modal-footer">
                <a id="modalExcluir" class='btn btn-primary' href=''>Confirmar</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>

        </div>
    </div>
</div>

<script>
    $('#myModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        $("#modalExcluir").attr('href','?classe=Projeto&acao=delete&id='+id);
    });
</script>