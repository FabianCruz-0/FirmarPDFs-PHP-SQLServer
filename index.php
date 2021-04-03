<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="shortcut icon" href="content/images/icon.png" type="image/x-icon" />


    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="content/css/style.css" />

    <title>Inicio - Firma Electrónica</title>
</head>

<body class="light-theme">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="content/images/navbar-img.png" alt="" class="d-inline-block nav-img" />
                Firma Electrónica
            </a>
            <button type="button" class="btn" id="tema">CAMBIAR TEMA</button>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <center>
            <h1 class="bol">¡Bienvenido!</h1>
        </center>
        <p class="text-center mt-3">
            Ésta es una plataforma en línea para poder firmar documentos digitales
            (PDF) y hacerlos válidos legalmente en pasos muy sencillos.
        </p>
        <form action="">
            <div class="row">
                <div class="paso paso-uno  p-3 col-md ">
                    <div class="pad-col">
                        <p class="text-center bol">
                            Primero, favor de subir el archivo que deseas firmar.
                        </p>
                        <label for="archivo-pdf">Archivo PDF:</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="archivo-pdf" required />
                        </div>
                    </div>
                </div>

                <div class="paso p-3 col-md">
                    <div class="pad-col paso-dos">
                        <p class="text-center bol">
                            Segundo, sube tus archivos de Firma Electrónica.
                        </p>
                        <label for="archivo-key">Archivo .KEY:</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="archivo-key" required />
                        </div>
                        <label for="archivo-cer">Archivo .CER:</label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="inputGroupFile02" itemid="archivo-cer" required />
                        </div>
                    </div>
                </div>

                <div class="paso paso-tres p-3 col-md">
                    <div class="pad-col">
                        <p class="text-center bol">Por último, introduce tus datos:</p>
                        <label for="nombre">
                            Nombre Completo:
                        </label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="Nombre Completo" id="nombre" required />
                        </div>
                        <label for="nombre">
                            RFC:
                        </label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="text" placeholder="RFC" id="nombre" required />
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-1 col-8 mx-auto mt-5">
                <button class="btn btn-success bol" type="button">FIRMAR</button>
              </div>

        </form>
    </div>

        <div class="container-fluid ft">
            <p class="text-center ft-text">Fabián Cruz. Todos los derechos reservados.</p>
        </div>

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf"
        crossorigin="anonymous"></script>
        <script src="/content/JS/index.js"></script> 


        <?php
$serverName = "serverName\sqlexpress";

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( "Database"=>"dbName");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "<script>console.log('Conexión no se pudo establecer.');</script><br />";
     die( print_r( sqlsrv_errors(), true));
}
?>


</body>
</html>