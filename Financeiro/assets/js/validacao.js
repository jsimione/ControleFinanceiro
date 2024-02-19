function ValidarMeusDados() {
  var nome = document.getElementById("nome").value;
  var email = $("#email").val();

  if (nome.trim() == "") {
    alert("Preencher o campo nome");
    $("#nome").focus();
    return false;
  }
  if (email.trim() == "") {
    alert("Preencher o campo email");
    $("#email").focus();

    return false;
  }
}
function ValidarCategoria(){

    if( $("#nomecategoria").val().trim() == ''){
        alert("Preencher o campo NOME DA CATEGORIA");
        $("#nomecategoria").focus();
        return false;
    }
}
function ValidarEmpresa(){
  if( $("#nomeempresa").val().trim() == ''){
    alert("Preencher o campo NOME DA EMPRESA");
    $("#nomeempresa").focus();
    return false;

}
if( $("#telefone").val().trim() == ''){
  alert("Preencher o campo TELEFONE");
  $("#nometelefone").focus();
  return false;
}
}
function ValidarConta(){
  if( $("#banco").val().trim() == ''){
    alert("Preencher o campo BANCO");
    $("#nomebanco").focus();
    return false;
  }
  if( $("#agencia").val().trim() == ''){
    alert("Preencher o campo AGENCIA");
    $("#agencia").focus();
    return false;
  }
  if( $("#numero").val().trim() == ''){
    alert("Preencher o campo NÚMERO DA CONTA");
    $("#numero").focus();
    return false;
  }
  if( $("#saldo").val().trim() == ''){
    alert("Preencher o campo SALDO");
    $("#saldo").focus();
    return false;
  }
}
function ValidarMovimento(){
  if( $("#tipo").val().trim() == ''){
    alert("Selecione o TIPO");
    $("#tipo").focus();
    return false;
  }
  if( $("#data").val().trim() == ''){
    alert("Informe a DATA ");
    $("#data").focus();
    return false;
  }
  if( $("#valor").val().trim() == ''){
    alert("Preencher o campo VALOR");
    $("#valor").focus();
    return false;
  }
  if( $("#categoria").val().trim() == ''){
    alert("Selecione uma Categoria");
    $("#categoria").focus();
    return false;
  }
  if( $("#empresa").val().trim() == ''){
    alert("Selecione uma EMPRESA");
    $("#categoria").focus();
    return false;
  }
  if( $("#conta").val().trim() == ''){
    alert("Selecione uma CONTA");
    $("#conta").focus();
    return false;
  }
}
function ValidarConsultaPeriodo(){
  if( $("#tipo").val().trim() == ''){
    alert("Selecione o TIPO");
    $("#tipo").focus();
    return false;
}
if( $("#inicial").val().trim() == ''){
  alert("Informe a DATA INICIAL");
  $("#inicia").focus();
  return false;
}
if( $("#final").val().trim() == ''){
  alert("Informe a DATA FINAL");
  $("#final").focus();
  return false;
}
}
function ValidarLogin(){
  if( $("#email").val().trim() == ''){
    alert("Preencher o campo EMAIL");
    $("#email").focus();
    return false;

}
if( $("#senha").val().trim() == ''){
  alert("Preencher o campo SENHA");
  $("#senha").focus();
  return false;

}
}
function ValidarCadastro(){
  if( $("#nome").val().trim() == ''){
    alert("Preencher o campo NOME");
    $("#nome").focus();
    return false;

}
if( $("#email").val().trim() == ''){
  alert("Preencher o campo EMAIL");
  $("#email").focus();
  return false;

}
if( $("#senha").val().trim() == ''){
  alert("Preencher o campo SENHA");
  $("#senha").focus();
  return false;

}
if( $("#senha").val().trim().length < 6){
  alert("A senha deverá conter no mínimo 6 caracteres");
  $("#senha").focus();
  return false;

}
if( $("#senha").val().trim() != $("#rsenha").val().trim()){
  alert("As Senhas não Coincidem");
  $("#rsenha").focus();
  return false;

}

}