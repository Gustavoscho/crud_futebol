<?php

include 'db.php';



$sql = "SELECT * FROM times";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table border ='1'>
        <tr>
            <th> ID </th>
            <th> Nome </th>
            <th> Cidade </th>
            <th> Editar Times </th>
            <th> Deletar Times </th>
            </tr>
           <a href='index.php'>Voltar para página inicial</a>
         ";

    while ($row = $result->fetch_assoc()) {

        echo "<tr>
                    <td> {$row['id']} </td>
                    <td> {$row['nome']} </td>
                    <td> {$row['cidade']} </td>
                    <td> <a href='update_time.php?id={$row['id']}'> Editar </a> </td>
                    <td> <a href='delete_time.php?id={$row['id']}'> Deletar </a></td>
                </tr>"
                ;
    }
    echo "</table>";
} else {
    echo "Nenhum Registro de Time Encontrado.";
    echo "<a href='create.php'>Criar Registro de Time</a>";
}

$conn -> close();