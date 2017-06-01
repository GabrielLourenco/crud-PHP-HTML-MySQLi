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
}

function alterarUsuario(){
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
