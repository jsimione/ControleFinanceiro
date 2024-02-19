<?php
require_once '../DAO/utilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/UsuarioDAO.php';

$objdao = new UsuarioDAO();

if (isset($_POST['btnGravar'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $objdao = new UsuarioDAO();

    $ret = $objdao->GravarMeusDados($nome, $email);
}
$dados = $objdao->CarregarMeusDados();


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php'; ?>

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
                        <h2>Meus Dados.</h2>
                        <h5>Aqui você pode alterar seus dados de cadastro.</h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="meus_dados.php">
                    <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Digite seu Nome aqui..." name="nome" id="nome" value="<?= $dados[0]['nome_usuario'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" class="form-control" placeholder="Digite seu E-mail..." name="email" id="email" value="<?= $dados[0]['email_usuario'] ?>"/>
                    </div>
                    <button type="submit" onclick=" return ValidarMeusDados()" class="btn btn-success" name="btnGravar">Salvar</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>