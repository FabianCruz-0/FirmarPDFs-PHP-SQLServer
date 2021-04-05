<?php

$nombrePDF = $_FILES['archivo-pdf']['name'];
/* $nombreKey = $_FILES['archivo-key']['name'];
$nombreCer = $_FILES['archivo-cer']['name']; */

$tipoPDF = $_FILES['archivo-pdf']['type'];
/* $tipoKey = $_FILES['archivo-key']['type'];
$tipoCer = $_FILES['archivo-cer']['type']; */

$sizePDF = $_FILES['archivo-pdf']['size'];
/* $sizeKey = $_FILES['archivo-key']['size'];
$sizeCer = $_FILES['archivo-cer']['size']; */

$ubicationPDF = $_FILES['archivo-pdf']['tmp_name'];
/* $ubicationKey = $_FILES['archivo-key']['tmp_name'];
$ubicationCer = $_FILES['archivo-cer']['tmp_name']; */

$srv = $_SERVER['DOCUMENT_ROOT'];
$trim = trim($srv, "htdocs");
$carpetaDestino = $trim . 'tmp/';




move_uploaded_file($ubicationPDF,$carpetaDestino.$nombrePDF);
/* move_uploaded_file($ubicationKey,$carpetaDestino.$nombreKey);
move_uploaded_file($ubicationCer,$carpetaDestino.$nombreCer); */

    $serverName = "DESKTOP-0HN87OP\SQLEXPRESS";

    // Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
    // La conexión se intentará utilizando la autenticación Windows.
    $connectionInfo = array("Database" => "firmaPHP");
    $conn = sqlsrv_connect($serverName, $connectionInfo);

    if ($conn) {?>
    <script> 
        window.alert('se realizó la conexión');
    </script>
        <?php
    } else { ?>
    <script>
        window.alert('se realizó la conexión');
    </script>
        <?php
        die(print_r(sqlsrv_errors(), true));
    }

    /* 

    La funcion por defecto para los querys es: 
    sqlsrv_query ( resource $conn , string $sql , array $params = ? , array $options = ? )
    Los parámetros varian según lo deseado.
    Params array (obligatorio pero puede ser vacio si SELECT)

    SELECT
    $query = "SELECT * FROM usuarios"; ----- Aquí se declara el query. Si es un insert, declarar $params justo después.
    $stmt = sqlsrv_query( $conn, $sql, $params); ----- stmt = result-set, Resultado de la consulta.

    INSERT
    $sql = "INSERT INTO Table_1 (id, data) VALUES (?, ?)";
    $params = array(1, "some data");
    $stmt = sqlsrv_query( $conn, $sql, $params);

    */

    $PDF2upload = fopen($carpetaDestino.$nombrePDF, "r");
    $contentPDF = fread($PDF2upload, $sizePDF);
    $content64PDF = base64_encode($contentPDF);
    fclose($PDF2upload);

    /* $Key2upload = fopen($carpetaDestino.$nombreKey, "r");
    $contentKey = fread($Key2upload, $sizeKey);
    fclose($Key2upload);

    $Cer2upload = fopen($carpetaDestino.$nombreCer, "r");
    $contentCer = fread($Cer2upload, $sizeCer);
    fclose($Cer2upload); */

       
    $query = "INSERT INTO pdf (contenido) VALUES ('$content64PDF')";
    /* 
    archID int NOT NULL PRIMARY KEY identity(1,1),
    nombrePDF text NOT NULL,
	nombreKey text not null,
	nombreCer text not null,
	archPDFCont varbinary(MAX) not null,
	archKeyCont varbinary(MAX) not null,
	archCerCont varbinary(MAX) not null,
	tipoPDF varchar(10) not null,
	tipoKey varchar(10) not null,
	tipoCer varchar(10) not null

    */
    $stmt = sqlsrv_query($conn, $query);

    $query = "SELECT * FROM pdf";
    $stmt = sqlsrv_query($conn, $query);

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $pdfServer = $row['contenido'];
  }

  echo "<iframe src=data:application/pdf;base64,".$pdfServer." height='100%' width='100%'></iframe>";

?>