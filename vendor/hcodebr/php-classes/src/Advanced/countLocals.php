<?php

require_once '../DB/Secret.php';

$mylocals = $_POST['mylocals'];

//Conectando ao banco de dados
$con = mysqli_connect($servidor, $usuario, $senha, $bancodedados);
// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = "SELECT b.deslocal FROM tb_demands a
INNER JOIN tb_locals b ON a.idlocal = b.idlocal
WHERE deslocal = '$mylocals'";

if ($result = mysqli_query($con, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    // printf("Result set has %d rows.\n",$rowcount);
    // Free result set
    mysqli_free_result($result);

}

mysqli_close($con);

echo json_encode($rowcount);
