<?php
?>
<form name="dadosUsuario" action="database/actions.php" method="post">
<label>Nome:</label><input type="text" name="nome" />
<label>Email:</label><input type="email" name="email" />
<label>Idade:</label><input type="number" name="idade" />
<label>Status:</label><input type="number" name="status" />
<label>Senha:</label><input type="password" name="senha" />
<input type="hidden" value="inserir" name="acao" />
<input type="submit" value="Enviar" name="Enviar" />

</form>
