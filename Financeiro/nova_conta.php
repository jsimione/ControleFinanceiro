<?php
require_once '../DAO/utilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/ContaDAO.php';
if (isset($_POST['btnGravar'])) {
    $banco = $_POST['banco'];
    $agencia = $_POST['agencia'];
    $agencia = $_POST['agencia'];
    $saldo = $_POST['saldo'];


    $objdao = new ContaDAO();

    $ret = $objdao->CadastrarConta($banco, $agencia, $agencia, $saldo);
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
                        <?php include_once '_msg.php' ?>
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas suas contas </h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="nova_conta.php">
                <div class="form-group">
                    <label>Nome do Banco*</label>
                    <input class="form-control" placeholder="Digite o nome do banco..." name="banco" id="banco"/>
                </div>
                <div class="form-group">
                    <label>Agência*</label>
                    <input class="form-control" placeholder="Digite a agência" name="agencia" id="agencia" />
                </div>
                <div class="form-group">
                    <label>Número da conta*</label>
                    <input class="form-control" placeholder="Digite o número da conta" name="conta" id="numero"/>
                </div>
                <div class="form-group">
                    <label>Saldo*</label>
                    <input class="form-control" placeholder="Digite o saldo da conta" name="saldo" id="saldo"/>
                </div>
                <button type="submit" onclick="return ValidarConta()" name="btnGravar" class="btn btn-success">Salvar</button>
</form>
            </div>
        </div>
    </div>
</body>
</html>