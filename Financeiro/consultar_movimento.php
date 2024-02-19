<?php
require_once '../DAO/utilDAO.php';
UtilDAO::VerificarLogado();
require_once '../DAO/MovimentoDAO.php';

$dt_inicial = '';
$dt_final = '';
$tipo = '';

if (isset($_POST['btnPesquisar'])) {
    $tipo = $_POST['tipo'];
    $dt_inicial = $_POST['data_inicial'];
    $dt_final = $_POST['data_final'];

    $dao = new MovimentoDAO();
    $movs = $dao->FiltrarMovimento($tipo, $dt_inicial, $dt_final);
} else if (isset($_POST['btnExcluir'])) {
    $idMov = $_POST['idMov'];
    $idConta = $_POST['idConta'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $dao = new MovimentoDAO();
    $ret = $dao->ExcluirMovimento($idMov, $idConta, $valor, $tipo);
}

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
                        <?php include_once '_msg.php'  ?>
                        <h2>Consultar Movimento.</h2>
                        <h5>Aqui você pode consultar todas as suas movimentações financeiras.</h5>
                    </div>
                </div>
                <hr />
                <form method="post" action="consultar_movimento.php">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Tipo do Movimento</label>
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saida</option>
                                <option value="0">Todos</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Inicial</label>
                            <input type="date" class="form-control" id="inicial" name="data_inicial" value="<?= $dt_inicial ?>" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Data Final</label>
                            <input type="date" class="form-control" id="final" name="data_final" value="<?= $dt_final ?>" />
                        </div>
                    </div>
                    <div style="text-align:center;">
                        <Button class="btn btn-primary" onclick="return ValidarConsultaPeriodo()" name="btnPesquisar">Consultar</Button>
                </form>
                <hr>
                <?php if (isset($movs)) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span> Resultado encontrado </span>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Data</th>
                                                    <th>Tipo</th>
                                                    <th>Categoria</th>
                                                    <th>Empresa</th>
                                                    <th>Conta</th>
                                                    <th>Valor</th>
                                                    <th>Observação</th>
                                                    <th>Ação</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                for ($i = 0; $i < count($movs); $i++) {
                                                    if ($movs[$i]['tipo_movimento'] == 1) {
                                                        $total = $total + $movs[$i]['valor_movimento'];
                                                    } else {
                                                        $total = $total - $movs[$i]['valor_movimento'];
                                                    }
                                                ?>
                                                    <tr>
                                                        <td> <?= $movs[$i]['data_movimento'] ?> </td>
                                                        <td><?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?></td>
                                                        <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                        <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                        <td><?= $movs[$i]['banco_conta'] ?> Ag. <?= $movs[$i]['agencia_conta'] ?> - Núm: <?= $movs[$i]['numero_conta'] ?></td>
                                                        <td>R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                        <td><?= $movs[$i]['obs_movimento'] ?></td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modalExcluir<?= $i  ?>">Excluir</a>
                                                            <form method="post" action="consultar_movimento.php">
                                                                <input type="hidden" name="idMov" value="<?= $movs[$i]['id_movimento']    ?>">
                                                                <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta']    ?>">
                                                                <input type="hidden" name="tipo" value="<?= $movs[$i]['tipo_movimento']    ?>">
                                                                <input type="hidden" name="valor" value="<?= $movs[$i]['valor_movimento']    ?>">

                                                                <div class="modal fade" id="modalExcluir<?= $i  ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title" id="myModalLabel">Confirmação de exclusão</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <center><b>Deseja excluir o Movimento:</b></center>
                                                                                <br><br>
                                                                                <b>Data do movimento:</b> <?= $movs[$i]['data_movimento'] ?><br>
                                                                                <b>Tipo do movimento:</b> <?= $movs[$i]['tipo_movimento'] == 1 ? 'Entrada' : 'Saída' ?><br>
                                                                                <b>Categoria:</b> <?= $movs[$i]['nome_categoria'] ?> <br>
                                                                                <b>Empresa:</b> <?= $movs[$i]['nome_empresa'] ?> <br>
                                                                                <b>Conta:</b> <?= $movs[$i]['banco_conta'] ?>Ag. <?= $movs[$i]['agencia_conta'] ?> - Núm: <?= $movs[$i]['numero_conta'] ?> <br>
                                                                                <b>Valor:</b> R$ <?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?>



                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-primary" name="btnExcluir">Sim</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <center>
                                            <label style="color: <?= $total < 0 ? 'red' : 'green' ?>;">TOTAL: R$ <?= number_format($total, 2, ',', '.');
                                                                                                                    $total ?></label>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
</body>

</html>