<?php

include 'db.php';

$times = [];
$sql_times = "SELECT id, nome FROM times ORDER BY nome";
$result_times = $conn->query($sql_times);
if ($result_times->num_rows > 0) {
    while($row = $result_times->fetch_assoc()) {
        $times[] = $row;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $time_casa_id = $_POST['time_casa_id'];
    $time_fora_id = $_POST['time_fora_id'];
    $data_jogo = $_POST['data_jogo'];
    $gols_casa = $_POST['gols_casa'];
    $gols_fora = $_POST['gols_fora'];

  
    if ($time_casa_id == $time_fora_id) {
        echo "Erro: O time da casa não pode ser o mesmo que o time visitante.";
    } else {
        $sql = "INSERT INTO partidas (time_casa_id, time_fora_id, data_jogo, gols_casa, gols_fora) 
                VALUES ('$time_casa_id', '$time_fora_id', '$data_jogo', '$gols_casa', '$gols_fora')";

        if ($conn->query($sql) === true) {
            echo "Nova partida criada com sucesso.";
        } else {
            echo "Erro: " . $sql . '<br>' . $conn->error;
        }
    }
    $conn->close();
}

?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Partida</title>
</head>

<body>
    <h2>Cadastrar Nova Partida</h2>

    <form method="POST" action="create_partida.php">
        <label for="time_casa_id">Time da Casa:</label>
        <select name="time_casa_id" required>
            <option value="">Selecione o time da casa</option>
            <?php foreach ($times as $time): ?>
                <option value="<?php echo $time['id']; ?>"><?php echo $time['nome']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="time_fora_id">Time Visitante:</label>
        <select name="time_fora_id" required>
            <option value="">Selecione o time visitante</option>
            <?php foreach ($times as $time): ?>
                <option value="<?php echo $time['id']; ?>"><?php echo $time['nome']; ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>

        <label for="data_jogo">Data do Jogo:</label>
        <input type="date" name="data_jogo" required>
        <br><br>

        <label for="gols_casa">Gols do Time da Casa:</label>
        <input type="number" name="gols_casa" min="0" value="0" required>
        <br><br>

        <label for="gols_fora">Gols do Time Visitante:</label>
        <input type="number" name="gols_fora" min="0" value="0" required>
        <br><br>

        <input type="submit" value="Cadastrar Partida">
    </form>

    <br>
    <a href="index.php">Voltar para página inicial</a>
</body>
</html>