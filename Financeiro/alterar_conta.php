//<?php

require_once '../DAO/ContaDAO.php';

$dao = new ContaDAO();

if(isset($_GET['cod']) && is_numeric($_GET['cod'])){

   $idConta = $_GET['cod'];

    $dados = $dao->DetalharConta($idConta);

   if (count($dados) == 0){
       header('location: consultar_conta.php');
        exit;
   }
}else if (isset($_POST['btnSalvar'])){
  $idConta = $_POST['cod'];
  $banco = $_POST['banco'];
  $numero = $_POST['numero'];
  $agencia = $_POST['agencia'];
  $saldo = $_POST['saldo'];


    $ret = $dao->AlterarConta($idConta, $banco, $numero, $agencia, $saldo);
    header('location: consultar_conta.php?ret=' . $ret);
    exit;

}else if (isset($_POST['btnExcluir'])) {
    $idConta = $_POST['cod'];
   $ret = $dao->ExcluirConta($idConta);
  header('location: consultar_conta.php?ret=' . $ret);
    exit;
}else {
 header('location: consultar_conta.php');
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
                        <h2>Alterar Conta.</h2>
                        <h5>Aqui você poderá Alterar ou excluir  suas contas </h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="alterar_conta.php">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                <div class="form-group">
                    <label>Nome do Banco*</label>
                    <input class="form-control" placeholder="Digite o nome do banco..." id="banco" name="banco" value="<?= $dados[0]['banco_conta'] ?>" />
                </div>
                <div class="form-group">
                    <label>Agência*</label>
                    <input class="form-control" placeholder="Digite a agência" id="agencia" name="agencia" value="<?= $dados[0]['agencia_conta'] ?>" />
                </div>
                <div class="form-group">
                    <label>Número da conta*</label>
                    <input class="form-control" placeholder="Digite o número da conta" id="numero" name="numero" value="<?= $dados[0]['numero_conta'] ?>" />
                </div>
                <div class="form-group">
                    <label>Saldo*</label>
                    <input class="form-control" placeholder="Digite o saldo da conta" id="saldo" name="saldo" value="<?= $dados[0]['saldo_conta'] ?>" />
                </div>
                <button type="submit" onclick="return ValidarConta()" class="btn btn-success" name="btnSalvar">Salvar</button>
                <button type="button" data-toggle="modal" data-target="#modalExcluir" class="btn btn-danger" onclick=" return ValidarConta()">Excluir</button>

                <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir a Conta: <b> <?= $dados[0]['banco_conta'] ?> / Agência:<?= $dados[0]['agencia_conta'] ?> - Número: <?= $dados[0]['numero_conta'] ?> ? </b>
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