<?php

require_once 'Conexao.php';
require_once 'UtilDAO.php';

class CategoriaDAO extends Conexao
{
  public function CadastrarCategoria($nome)
  {



    if (trim($nome) == '') {
      return 0;
    }
    // 1 passo: criar uma variavel que receberá o obj conexão

    $conexao = parent::retornarConexao();

    // 2 passo: criar uma variavel que recebera o texto do comando SQL que devera ser executado no BD

    $comando_sql = 'insert into tb_categoria (nome_categoria, id_usuario) values (?, ?);';

    // 3 passo: criar um obj que será config. e levando o BD a ser executado                   

    $sql = new PDOStatement();

    // 4 passo: Colocar dentro do obj $sql a conexão preparada para executar o comando_sql

    $sql = $conexao->prepare($comando_sql);

    // Passo: Verificar se no comando_sql eu tenho? para ser configurado. Se tiver, configurar os bindValues

    $sql->bindValue(1, $nome);
    $sql->bindValue(2, UtilDAO::Codigologado());

    // Passo 6: executar no BD
    try {
      $sql->execute();
      return 1;
    } catch (Exception $ex) {
      echo $ex->getMessage();
      return -1;
    }
  }
 public function AlterarCaregoria($nome, $idCategoria){

if(trim($nome) == '' || $idCategoria == ''){
  return 0;
}
$conexao = parent::retornarConexao();
$comando_sql = 'update tb_categoria set nome_categoria = ? where id_categoria = ? and id_usuario = ?';
$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1, $nome);
$sql->bindValue(2, $idCategoria);
$sql->bindValue(3, UtilDAO::Codigologado());

try{
$sql->execute();
return 1;

}
catch(Exception $ex){
echo $ex->getMessage();
return -1;
}

 }
public function ExcluirCategoria($idCategoria){
if($idCategoria == ''){
  return 0;

}
$conexao = parent::retornarConexao();
$comando_sql = 'delete from tb_categoria where id_categoria = ? and id_usuario = ?';
$sql = new PDOStatement();
$sql = $conexao->prepare($comando_sql);
$sql->bindValue(1, $idCategoria);
$sql->bindValue(2, UtilDAO::Codigologado());
try{
  $sql->execute();
  return 1;
  
  }
  catch(Exception $ex){
  return -4;
  }

}

  public function ConsultarCategoria()
  {
    $conexao = parent::retornarConexao();
    $comando_sql = 'select id_categoria, 
                nome_categoria 
                from tb_categoria where id_usuario = ? order by nome_categoria';
    $sql = new PDOStatement();
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, UtilDAO::Codigologado());

    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    return $sql->fetchAll();
  }

  public function DetalharCategoria($idCategoria)
  {
    $conexao = parent::retornarConexao();
    $comando_sql = 'select id_categoria, nome_categoria from tb_categoria where id_categoria = ? and id_usuario = ?';
    $sql = new PDOStatement();
    $sql = $conexao->prepare($comando_sql);
    $sql->bindValue(1, $idCategoria);
    $sql->bindValue(2, UtilDAO::Codigologado());
    $sql->setFetchMode(PDO::FETCH_ASSOC);
    $sql->execute();
    return $sql->fetchAll();
  }
}
