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
  $usuario = array(
    'nome' => $_POST['nome'],
    'email' => $_POST['email'],
    'idade' => $_POST['idade'],
    'status' => $_POST['status']
  );

  $grava = DBCreate('clientes',$usuario);

  header('Location:../index.php');
}

function alterarUsuario(){
  $usuario = array(
    'nome' => $_POST['nome'],
    'email' => $_POST['email'],
    'idade' => $_POST['idade'],
    'status' => $_POST['status']
  );

  $altera = DBUpdate('clientes', $usuario, 'id='.$_POST['id']);

  header('Location:../index.php');
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

function formatoData($data) {
  $array = explode("-",$data);
  return $array2 = ($array[2]."/".$array[1]."/".$array[0]);
}
?>
