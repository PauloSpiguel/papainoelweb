<?php

require_once 'Secret.php';

$conn = mysqli_connect($servidor, $usuario, $senha, $bancodedados);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$busca = $_POST['busca'];
$query = mysqli_query($conn, "SELECT * FROM tb_kids WHERE deskid = '$busca'");
$num   = mysqli_num_rows($query);
if ($num > 0) {

    while ($row = mysqli_fetch_assoc($query)) {
        //echo ($row['deskid']);
        echo "Senha já lançada para esta criança!
		Lançada em: " . $row['dtregister'];
    }
} else {

    echo 'não cadastrado';
}

mysqli_close($conn);
