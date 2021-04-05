<?php

$nombrePDF = $_FILES['archivo-pdf']['name'];
$nombreKey = $_FILES['archivo-key']['name'];
$nombreCer = $_FILES['archivo-cer']['name'];

$tipoPDF = $_FILES['archivo-pdf']['type'];
$tipoKey = $_FILES['archivo-key']['type'];
$tipoCer = $_FILES['archivo-cer']['type'];

$sizePDF = $_FILES['archivo-pdf']['size'];
$sizeKey = $_FILES['archivo-key']['size'];
$sizeCer = $_FILES['archivo-cer']['size'];

$ubicationPDF = $_FILES['archivo-pdf']['tmp_name'];
$ubicationKey = $_FILES['archivo-key']['tmp_name'];
$ubicationCer = $_FILES['archivo-cer']['tmp_name'];

$nombre = $_POST['nombre'];
$nombre2Server = utf8_decode($nombre);
$rfc = $_POST['rfc'];

$srv = $_SERVER['DOCUMENT_ROOT'];
$trim = trim($srv, "htdocs");
$carpetaDestino = $trim . 'tmp/';




move_uploaded_file($ubicationPDF,$carpetaDestino.$nombrePDF);
move_uploaded_file($ubicationKey,$carpetaDestino.$nombreKey);
move_uploaded_file($ubicationCer,$carpetaDestino.$nombreCer);

require('content/fpdf/fpdf.php');
require_once('content/FPDI-2.3.6/src/autoload.php');
require('content/Jurosh/PDFMerge/PDFMerger.php');
require('content/Jurosh/PDFMerge/PDFObject.php');

date_default_timezone_set("America/Monterrey");

$futureDate=date('j F Y, \a \l\a \h\o\\r\a g:i A', strtotime('+1 year'));

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(40,10,utf8_decode('Firmado por: '.$nombre.'.'));
$pdf->Ln(5);
$pdf->Cell(40,10,utf8_decode('Con RFC: '.$rfc.'.'));
$pdf->Ln(5);
$pdf->Cell(40,10,utf8_decode('Con la firma electrónica SAT (archivos .KEY, .CER y contraseña de clave privada).'));
$pdf->Ln(5);
$pdf->Cell(40,10,utf8_decode('Firmado el: '.date("j F Y, \a \l\a \h\o\\r\a g:i A".'.')));
$pdf->Ln(5);
$pdf->Cell(40,10,utf8_decode('Válido legalmente hasta: '.$futureDate.' (1 año).'));
$pdf->Output('F',$carpetaDestino.'nuevo.pdf');

$pdf = new \Jurosh\PDFMerge\PDFMerger;

// add as many pdfs as you want
$pdf->addPDF($carpetaDestino.$nombrePDF, 'all', 'vertical')
  ->addPDF($carpetaDestino.'nuevo.pdf', 'all');

$pdf->merge('file', $carpetaDestino.'firmado.pdf');


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

    $PDFFirmado2upload = fopen($carpetaDestino.'firmado.pdf', "r");
    $contentPDFFirmado = fread($PDFFirmado2upload, filesize($carpetaDestino.'firmado.pdf'));
    $content64PDFFirmado = base64_encode($contentPDFFirmado);
    fclose($PDFFirmado2upload);

    $Key2upload = fopen($carpetaDestino.$nombreKey, "r");
    $contentKey = fread($Key2upload, $sizeKey);
    $content64Key = base64_encode($contentKey);
    fclose($Key2upload);

    $Cer2upload = fopen($carpetaDestino.$nombreCer, "r");
    $contentCer = fread($Cer2upload, $sizeCer);
    $content64Cer = base64_encode($contentCer);
    fclose($Cer2upload);

       
    $query = "INSERT INTO docsFirmados (nombre,rfc,contentPDF,contentPDFFirmado,contentKey,contentCer) VALUES ('$nombre2Server','$rfc','$content64PDF','$content64PDFFirmado','$content64Key','$content64Cer')";
    /* 
    docsFirmados(
    nombre varchar(100) not null,
    rfc varchar(20) not null,
    contentPDF varchar(max) not null,
    contentPDFFirmado varchar (max) not null,
    contentKey varchar(max) not null,
    contentCer varchar(max) not null

    */

    $stmt = sqlsrv_query($conn, $query);

    $query = "SELECT * FROM docsFirmados";
    $stmt = sqlsrv_query($conn, $query);

    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
        $pdfServer = $row['contentPDFFirmado'];
  }

   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="shortcut icon" href="content/images/icon.png" type="image/x-icon" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="content/css/style.css" />

    <title>Inicio - Firma Electrónica</title>
</head>

<body class="light-theme">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./">
                <img src="content/images/navbar-img.png" alt="" class="d-inline-block nav-img" />
                Firma Electrónica
            </a>
            <button type="button" class="btn" id="tema">CAMBIAR TEMA</button>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <center>
            <h1 class="bol">¡Ya está listo <?php echo $nombre?> !</h1>
        </center>
        <p class="text-center mt-3">
            Aquí tienes tu documento firmado, incluye tu información en la página final. ¡descárgalo!.
        </p>
        
        <?php
    echo "<center><iframe src=data:application/pdf;base64,".$pdfServer." height='100%' width='100%'></iframe></center>";
    ?>

    </div>
    
    <div class="container-fluid ft">
        <p class="text-center ft-text">Fabián Cruz. Todos los derechos reservados.</p>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script>
const boton = document.getElementById('tema');

const currentTheme = localStorage.getItem('theme');
if (currentTheme === 'dark') {
    document.body.classList.replace('light-theme','dark-theme');
    
} else if (currentTheme === 'light') {
    document.body.classList.toggle('dark-theme','light-theme');
}

let turno = true;
boton.addEventListener("click", () => {
  if (turno == true) {
    document.body.classList.replace("light-theme", "dark-theme");
    theme = 'dark';
    turno=false;
  } else {
    document.body.classList.replace("dark-theme", "light-theme");
    theme = 'light';
    turno=true;
  }
  localStorage.setItem('theme', theme)
});
    </script>
</body>

</html>