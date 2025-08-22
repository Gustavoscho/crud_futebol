<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = $_POST['nome'];
    $cidade = $_POST['cidade'];

    $sql = " INSERT INTO times (nome,cidade) VALUE ('$nome','$cidade')";

    if ($conn->query($sql) === true) {
        echo "Novo time criado com sucesso.";
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
    <title>Create_time</title>
</head>

<body>

    <form method="POST" action="create_time.php">

        <label for="name">Nome:</label>
        <input type="text" name="name" required>

        <label for="cidade">Cidade:</label>
        <input type="text" name="cidade" required>

        <input type="submit" value="Adicionar">

    </form>

    <a href="index.php">Voltar para página inicial</a>

</body>

</html>