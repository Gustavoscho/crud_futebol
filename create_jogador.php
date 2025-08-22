<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nome = $_POST['nome'];
    $posicao = $_POST['posicao'];
    $time = $_POST['time'];

    $sql = "INSERT INTO usuarios (nome, posicao, time) VALUE ('$nome', '$posicao' '$time')";

    if ($conn->query($sql) === true) {
        echo "Novo registro criado com sucesso.";
    } else {
        echo "Erro " . $sql . '<br>' . $conn->error;
    }
    $conn->close();

}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>

<body>

    <form method="POST" action="create.php">

        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="posicao">Posição:</label>
        <input type="search" required>

        <label for="time">Time:</label>
        <input type="search" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="read.php">Ver registros.</a>

</body>

</html>