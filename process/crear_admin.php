<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Formulario Crear Alumnos</title>
</head>

<body>
<div class="crear_persona">
    <h1>Crear Administrador</h1>
    <form action="../process/recibir_crear.php" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Apellido:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Introduce tu apellido">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Correo:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" placeholder="Introduce tu correo">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Contraseña:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pass" name="pass" placeholder="Introduce tu password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Guardar</button>
                <a href='../view/control.php' class='btn btn-danger'>Cancelar</a>
            </div>
        </div>
    </form>
</body>
</html>