<?php

require_once '../DB/Secret.php';
require_once '../../../../autoload.php';


$conn = mysqli_connect($servidor, $usuario, $senha, $bancodedados);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//$busca = $_GET['deskid'];
$query = mysqli_query($conn, "SELECT * FROM tb_kids WHERE idkid = '2'");
$num   = mysqli_num_rows($query);
if ($num > 0) {

    while ($row = mysqli_fetch_assoc($query)) {
        
        $qr = new Endroid\QrCode\QrCode();

        $qr->setText($row['deskid']);
        $qr->setSize(200);
        $qr->setPadding(10);

        echo $row['deskid'];
    }
} else {

    echo 'não cadastrado';
}

mysqli_close($conn);
 var_dump('não cadastrado');