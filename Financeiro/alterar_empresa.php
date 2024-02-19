<?php

require_once '../DAO/EmpresaDAO.php';

$dao = new EmpresaDAO();

if(isset($_GET['cod']) && is_numeric($_GET['cod'])){

    $idEmpresa = $_GET['cod'];

    $dados = $dao->DetalharEmpresa($idEmpresa);

   if (count($dados) == 0){
       header('location: consultar_empresa.php');
        exit;
   }
}else if (isset($_POST['btnSalvar'])){
    $idEmpresa = $_POST['cod'];
    $nomeempresa = $_POST['nomeempresa'];
    $telefoneempresa = $_POST['telefoneempresa'];
    $enderecoempresa = $_POST['enderecoempresa'];

    $ret = $dao->AlterarEmpresa($idEmpresa, $nomeempresa, $telefoneempresa, $enderecoempresa);
    header('location: consultar_empresa.php?ret=' . $ret);
    exit;
}else if (isset($_POST['btnExcluir'])) {
    $idEmpresa = $_POST['cod'];
    $ret = $dao->ExcluirEmpresa($idEmpresa);
  header('location: consultar_empresa.php?ret=' . $ret);
    exit;
}else {
 header('location: consultar_empresa.php');
    exit;
}




?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
include_once '_head.php';
?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php'; ?>
                        <h2>Alterar Empresa</h2>
                        <h5>Aqui você poderá Alterar as suas empresas </h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="alterar_empresa.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_empresa'] ?>">
                    <div class="form-group">
                        <label>Nome da empresa*</label>
                        <input class="form-control" placeholder="Digite o nome da Empresa..." id="nomeempresa" name="nomeempresa" value="<?= $dados[0]['nome_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Telefone (WhatsApp)*</label>
                        <input class="form-control" placeholder="Digite o telefone da Empresa " id="telefone" name="telefoneempresa" value="<?= $dados[0]['telefone_empresa'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Endereço</label>
                        <input class="form-control" placeholder="Digite o endereço da Empresa (opcional)" name="enderecoempresa" value="<?= $dados[0]['endereco_empresa'] ?>" />
                    </div>
                    <button type="submit" onclick="return ValidarEmpresa()" class="btn btn-success" name="btnSalvar">Salvar</button>
                    <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" onclick=" return ValidarCategoria()">Excluir</button>
                    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a Empresa: <b> <?= $dados[0]['nome_empresa'] ?> ? </b>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>