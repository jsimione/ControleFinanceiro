<?php

require_once '../DAO/UsuarioDAO.php';
if (isset($_POST['btnAcessar'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $objdao = new UsuarioDAO();

    $ret = $objdao->ValidarLogin($email, $senha);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php' ; ?>
<body>
    <div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br />
                <br />
                <?php include_once '_msg.php' ?>
                <h2> Controle Financeiro</h2>
                <h5>( Faça seu Login aqui )</h5>
                <br />
            </div>
        </div>
        <div class="row ">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Digite os dados do seu login : </strong>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php" >
                            <br />
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-tag"></i></span>
                                <input type="email" class="form-control" placeholder="Digite seu E-mail aqui... " name="email" id="email" />
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" class="form-control" placeholder="Digite sua Senha aqui..." name="senha" id="senha" />
                            </div>
                            <button class="btn btn-primary " onclick="return ValidarLogin()" name="btnAcessar" >Acessar</button>
                            <hr />
                           <span> Não possui uma conta ?</span> <a href="cadastro.php">Clique aqui... </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>