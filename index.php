<?php
  require '/database/actions.php';
  $usuarios = getUsuariosNoBanco();

?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Página Inicial</title>
</head>

<body>
  <h1>CRUD PHP</h1>
  <a href="inserir.php" target="_blank">Inserir novo cadastro</a>
  <table border='1'>
    <thead>
      <tr>
        <td>Nome</td>
        <td>Email</td>
        <td>Idade</td>
        <td>Status</td>
        <td>Editar</td>
        <td>Excluir</td>
      </tr>
    </thead>
    <tbody>

      <?php
      foreach ($usuarios as $pessoa) {?>

      <tr>
        <td><?=$pessoa['nome']?></td>
        <td><?=$pessoa['email']?></td>
        <td><?=$pessoa['idade']?></td>
        <td><?=$pessoa['status']?></td>
        <td>
          <form action="alterar.php" name="alterar" method="POST">
            <input type="hidden" name="id" value="<?=$pessoa['id']?>" />
            <input type="submit" value="Editar" name="editar" />
          </form>
        </td>
        <td>
          <form action="database/actions.php" name="excluir" method="POST">
            <input type="hidden" name="id" value="<?=$pessoa['id']?>" />
            <input type="hidden" value="excluir" name="acao" />
            <input type="submit" value="Excluir" name="excluir" />
          </form>
        </td>
      </tr>
      <?php  } ?>

    </tbody>
  </table>
</body>
</html>
