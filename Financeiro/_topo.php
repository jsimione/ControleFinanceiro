<?php

require_once '../DAO/UtilDAO.php';

?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="tela_inicial.php">FINANCEIRO</a>
            </div>
            <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;">
             <span>Olá, <?=UtilDAO::NomeLogado() ?>                      .Dúvidas ou Suporte Técnico? Ligue (11) 99673-5777 &nbsp; </span>
        </nav>