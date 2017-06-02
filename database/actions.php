<?php
require 'database.php';

if(isset($_POST['acao'])) {
  if ($_POST["acao"]=="inserir"){
    inserirUsuario();
  }
  if ($_POST["acao"]=="alterar"){
    alterarUsuario();
  }
  if ($_POST["acao"]=="excluir"){
    excluirUsuario();
  }
}

function inserirUsuario(){
$permitir = verificarCamposVazios();
if ($permitir == true) {

  $existe = verificarEmail($_POST['email']);

  if ($existe == false) {
      $usuario = array(
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'idade' => $_POST['idade'],
        'status' => $_POST['status'],
        'senha' => criptySenha($_POST['senha'])
      );

      $grava = DBCreate('clientes',$usuario);

      header('Location:../index.php');
    }
    else {
      echo "email já existe";
    }
  } else {
    echo "nao pode ter campo branco";
  }
}

function alterarUsuario(){
$permitir = verificarCamposVazios();
if ($permitir == true) {

  $existe = verificarEmail($_POST['email']);

  if ($existe == false) {
      $usuario = array(
        'nome' => $_POST['nome'],
        'email' => $_POST['email'],
        'idade' => $_POST['idade'],
        'status' => $_POST['status'],
        'senha' => criptySenha($_POST['senha'])
      );

      $altera = DBUpdate('clientes', $usuario, 'id='.$_POST['id']);

      header('Location:../index.php');
    }
    else {
      var_dump($existe);
      echo "email já existe";
    }
  } else {
    echo "nao pode ter campo branco";
  }
}

function excluirUsuario(){
  $exclui = DBDelete('clientes', 'id='.$_POST['id']);

  header('Location:../index.php');
}

function getUsuariosNoBanco() {
  return DBRead('clientes','ORDER BY nome');
}

function getUsuarioID($id) {
  $pessoa = DBRead('clientes', 'WHERE id='.$id);
  return $pessoa[0];
}

function verificarCamposVazios() {
  $usuario = array(
    'nome' => trim($_POST['nome']),
    'email' => trim($_POST['email']),
    'idade' => trim($_POST['idade']),
    'status' => trim($_POST['status']),
    'senha' => trim($_POST['senha'])
  );
  foreach ($usuario as $value) {
    if ($value == "") {
      return false;
    }
  }
  return true;
}

function verificarEmail($email) {
  $existe = DBRead('clientes', 'WHERE email="'.$email.'"');

  if ($existe == false or $existe[0]['email'] == $email) {
    return false;
  } else {
    return true;
  }
}

function criptySenha($senha) {
  return md5($senha);
}

function formatoData($data) {
  $array = explode("-",$data);
  return $array2 = ($array[2]."/".$array[1]."/".$array[0]);
}
?>
