<?php
require '/database/actions.php';
$usuario = getUsuarioID($_POST['id']);

?>

<form name="dadosUsuario" action="database/actions.php" method="post">

<label>Nome:</label><input type="text" name="nome" value="<?=$usuario['nome']?>" />
<label>Email:</label><input type="email" name="email" value="<?=$usuario['email']?>" />
<label>Idade:</label><input type="number" name="idade" value="<?=$usuario['idade']?>" />
<label>Status:</label><input type="number" name="status" value="<?=$usuario['status']?>" />
<input type="hidden" value="<?=$usuario['id']?>" name="id" />
<input type="hidden" value="alterar" name="acao" />
<input type="submit" value="Enviar" name="Enviar" />

</form>
