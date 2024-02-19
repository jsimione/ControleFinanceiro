<?php
require_once '../DAO/utilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/EmpresaDAO.php';
if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $tel = $_POST['telefone'];
    $end = $_POST['endereco'];


    $objdao = new EmpresaDAO();

    $ret = $objdao->CadastrarEmpresa($nome, $tel, $end);
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
                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá cadastrar as suas empresas </h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="nova_empresa.php">
                <div class="form-group">
                    <label>Nome da empresa*</label>
                    <input class="form-control" placeholder="Digite o nome da Empresa aqui..." name="nome" id="nomeempresa"/>
                </div>
                <div class="form-group">
                    <label>Telefone (WhatsApp)*</label>
                    <input class="form-control" placeholder="Digite o telefone da Empresa aqui..." name="telefone" id="telefone"/>
                </div>
                <div class="form-group">
                    <label>Endereço</label>
                    <input class="form-control" placeholder="Digite o endereço da Empresa (opcional)" name="endereco" />
                </div>
                <button type="submit" onclick="return ValidarEmpresa()" name="btnGravar" class="btn btn-success">Salvar</button>
</form>
            </div>
        </div>
    </div>
</body>
</html>