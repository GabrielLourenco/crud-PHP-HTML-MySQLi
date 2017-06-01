<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <title>Página Inicial</title>
</head>
<body><pre>

  <?php

    require 'config.php';
    require 'connection_db.php';
    require 'database.php';

    $link = DBConnect();
    echo '<b>Conexão com o banco iniciada com sucesso, cabra!<br><br><br>';

    // $cliente = array(
    //   'nome' => 'Fernanda Negromonte',
    //   'email' => 'fernanda@gmail.com',
    //   'idade' => 12,
    //   'status' => 0
    // );
    //
    // $grava = DBCreate('clientes', $cliente);

//SQL COMMANDS:

//WHERE   - Condicoes de Seleção
//LIKE    - Pesquisar
          // LIKE '%a'  : Palavras terminadas em a
          // LIKE 'a%'  : Palavras começando em a
          // LIKE '%a%' : Palavras começando e terminando em a
//LIMIT   - Limitar Resultados (ex: LIMIT 4 - Devolve os 4 primeros; LIMIT 2,4 - Devolve do registro 2 ao 4)
//ORDER BY- Ordena exibição
          //ORDER BY param [DESC(Decrescente)]

    //$clientes = DBRead('clientes');

    //echo RetornaRegistros($clientes,'nome');

    // $altera = array (
    //   'status' => 1
    // );
    //
    // DBUpdate('clientes',$altera);

//    $delCliente = DBDelete('clientes', 'nome = "Fernanda Negromonte"');

  //  echo $delCliente;
//fechando conexão...
    DBClose($link);
    echo '<br><br><br>Conexão fechada com sucesso, boy!'
   ?>
</pre>
</body>
</html>
